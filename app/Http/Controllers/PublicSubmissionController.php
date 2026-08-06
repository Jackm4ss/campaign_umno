<?php

namespace App\Http\Controllers;

use App\Models\Aspiration;
use App\Models\Member;
use App\Models\MemberAidRequest;
use App\Services\TurnstileValidator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
            'aid_types.*' => ['in:keperluan_asas_dapur,wang_tunai,katil_hospital_kerusi_roda,van_jenazah_percuma,kad_kesihatan_kunan'],
            'patient_name' => [
                Rule::requiredIf(fn () => in_array('katil_hospital_kerusi_roda', $request->input('aid_types', []), true)),
                'nullable',
                'string',
                'max:255',
            ],
            'patient_identity_number' => [
                Rule::requiredIf(fn () => in_array('katil_hospital_kerusi_roda', $request->input('aid_types', []), true)),
                'nullable',
                'string',
                'max:50',
            ],
            'patient_phone' => [
                Rule::requiredIf(fn () => in_array('katil_hospital_kerusi_roda', $request->input('aid_types', []), true)),
                'nullable',
                'string',
                'max:50',
            ],
            'patient_address' => [
                Rule::requiredIf(fn () => in_array('katil_hospital_kerusi_roda', $request->input('aid_types', []), true)),
                'nullable',
                'string',
            ],
        ]);

        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('member-photos', 'public');
        }

        if ($request->hasFile('voter_proof')) {
            $data['voter_proof_path'] = $request->file('voter_proof')->store('voter-proofs', 'public');
        }

        $member = Member::create(collect($data)->except([
            'photo',
            'email_confirmation',
            'voter_proof',
            'aid_types',
            'patient_name',
            'patient_identity_number',
            'patient_phone',
            'patient_address',
        ])->all());

        $aidTypes = $request->input('aid_types', []);
        $needsPatient = in_array('katil_hospital_kerusi_roda', $aidTypes, true);

        foreach ($aidTypes as $type) {
            MemberAidRequest::create([
                'member_id' => $member->id,
                'type' => $type,
                'patient_name' => $needsPatient ? $request->input('patient_name') : null,
                'patient_identity_number' => $needsPatient ? $request->input('patient_identity_number') : null,
                'patient_phone' => $needsPatient ? $request->input('patient_phone') : null,
                'patient_address' => $needsPatient ? $request->input('patient_address') : null,
            ]);
        }

        return response()->json(['message' => 'Data anda telah diterima.']);
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
