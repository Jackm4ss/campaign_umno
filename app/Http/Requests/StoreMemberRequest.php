<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class StoreMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string, array<int, mixed>> */
    public function rules(): array
    {
        return [
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
                Rule::requiredIf(fn () => in_array('katil_hospital_kerusi_roda', $this->input('aid_types', []), true)),
                'nullable',
                'string',
                'max:255',
            ],
            'patient_identity_number' => [
                Rule::requiredIf(fn () => in_array('katil_hospital_kerusi_roda', $this->input('aid_types', []), true)),
                'nullable',
                'string',
                'max:50',
            ],
            'patient_phone' => [
                Rule::requiredIf(fn () => in_array('katil_hospital_kerusi_roda', $this->input('aid_types', []), true)),
                'nullable',
                'string',
                'max:50',
            ],
            'patient_address' => [
                Rule::requiredIf(fn () => in_array('katil_hospital_kerusi_roda', $this->input('aid_types', []), true)),
                'nullable',
                'string',
            ],
        ];
    }
}
