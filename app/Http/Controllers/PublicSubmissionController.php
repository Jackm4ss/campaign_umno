<?php

namespace App\Http\Controllers;

use App\Models\Aspiration;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\Member;
use App\Models\MemberAidRequest;
use App\Services\TurnstileValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class PublicSubmissionController extends Controller
{
    public function aspiration(Request $request, TurnstileValidator $turnstile)
    {
        $this->validateTurnstile($request, $turnstile);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'identity_number' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'message' => ['required', 'string', 'max:1500'],
        ]);

        Aspiration::create($data);

        return response()->json(['message' => 'Aspirasi anda telah diterima.']);
    }

    public function member(Request $request, TurnstileValidator $turnstile)
    {
        $this->validateTurnstile($request, $turnstile);

        $data = $request->validate([
            'photo' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:5120'],
            'full_name' => ['required', 'string', 'max:255'],
            'identity_number' => ['required', 'string', 'max:50', 'unique:members,identity_number'],
            'identity_type' => ['required', 'in:MyKad,MyTentera,MyPolis'],
            'birth_date' => ['required', 'date'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'confirmed', 'max:255'],
            'address' => ['required', 'string'],
            'presint' => ['required', 'string', 'max:100'],
            'voter_proof' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:5120'],
            'aid_types' => ['nullable', 'array'],
            'aid_types.*' => ['in:katil_hospital,makanan_asas,wang_tunai_rm_300'],
        ]);

        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('member-photos', 'public');
        }

        if ($request->hasFile('voter_proof')) {
            $data['voter_proof_path'] = $request->file('voter_proof')->store('voter-proofs', 'public');
        }

        $member = Member::create(collect($data)->except(['photo', 'email_confirmation', 'voter_proof', 'aid_types'])->all());

        foreach ($request->input('aid_types', []) as $type) {
            MemberAidRequest::create([
                'member_id' => $member->id,
                'type' => $type,
                'patient_name' => $request->input('patient_name'),
                'patient_identity_number' => $request->input('patient_identity_number'),
                'patient_phone' => $request->input('patient_phone'),
                'patient_address' => $request->input('patient_address'),
            ]);
        }

        return response()->json(['message' => 'Data anda telah diterima.']);
    }

    public function eventRegistrationStandalone(Request $request, TurnstileValidator $turnstile)
    {
        $this->validateTurnstile($request, $turnstile);

        $data = $request->validate([
            'event_title' => ['required', 'string', 'max:255'],
            'identity_number' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'confirmed', 'max:255'],
        ]);

        $event = Event::firstOrCreate(
            ['slug' => Str::slug($data['event_title']) ?: Str::uuid()->toString()],
            [
                'title' => $data['event_title'],
                'starts_at' => now(),
                'venue_name' => 'Putrajaya',
                'address' => 'Putrajaya',
                'description' => 'Pendaftaran kegiatan dari laman awam.',
                'status' => 'upcoming',
            ],
        );

        return $this->createEventRegistration($request, $event, $data);
    }

    public function eventRegistration(Request $request, Event $event, TurnstileValidator $turnstile)
    {
        $this->validateTurnstile($request, $turnstile);

        $data = $request->validate([
            'identity_number' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'confirmed', 'max:255'],
        ]);

        return $this->createEventRegistration($request, $event, $data);
    }

    private function createEventRegistration(Request $request, Event $event, array $data)
    {
        if (EventRegistration::where('event_id', $event->id)->where('identity_number', $data['identity_number'])->exists()) {
            throw ValidationException::withMessages([
                'identity_number' => 'No. kad pengenalan ini sudah terdaftar untuk kegiatan ini.',
            ]);
        }

        $registration = EventRegistration::create([
            'event_id' => $event->id,
            'identity_number' => $data['identity_number'],
            'email' => $data['email'],
            'qr_token' => Str::uuid()->toString(),
        ]);

        return response()->json([
            'message' => 'Pendaftaran berjaya! QR akan dikirim ke e-mel anda.',
            'qr_token' => $registration->qr_token,
        ]);
    }

    private function validateTurnstile(Request $request, TurnstileValidator $turnstile): void
    {
        if (! $turnstile->passes($request->input('cf-turnstile-response'), $request->ip())) {
            throw ValidationException::withMessages([
                'cf-turnstile-response' => 'Pengesahan anti-bot gagal. Sila cuba lagi.',
            ]);
        }
    }
}
