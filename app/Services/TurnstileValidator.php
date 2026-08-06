<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TurnstileValidator
{
    public function passes(?string $token, ?string $ip = null): bool
    {
        if (config('services.turnstile.bypass_local')) {
            return true;
        }

        if (! $token || ! config('services.turnstile.secret_key')) {
            return false;
        }

        $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => config('services.turnstile.secret_key'),
            'response' => $token,
            'remoteip' => $ip,
        ]);

        return (bool) $response->json('success', false);
    }
}
