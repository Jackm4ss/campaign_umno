<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class StoreEventRegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string, array<int, mixed>> */
    public function rules(): array
    {
        return [
            'event_title' => ['sometimes', 'required', 'string', 'max:255'],
            'identity_number' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'confirmed', 'max:255'],
        ];
    }
}
