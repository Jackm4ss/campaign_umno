<?php

namespace Tests\Feature;

use App\Models\Member;
use App\Services\TurnstileValidator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BantuanFormTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->app->bind(TurnstileValidator::class, fn () => new class extends TurnstileValidator {
            public function passes(?string $token, ?string $ip = null): bool
            {
                return true;
            }
        });
    }

    public function test_bantuan_page_renders(): void
    {
        $response = $this->get('/bantuan');

        $response->assertOk();
        $response->assertSee('BORANG BANTUAN');
        $response->assertSee('Keperluan Asas Dapur');
        $response->assertSee('Bantuan Wang Tunai');
        $response->assertSee('Katil Hospital / Kerusi Roda');
        $response->assertSee('Van Jenazah Percuma');
        $response->assertSee('Kad Kesihatan KuNan');
    }

    public function test_bantuan_qr_returns_svg(): void
    {
        $response = $this->get('/bantuan/qr-image');

        $response->assertOk();
        $response->assertHeader('Content-Type', 'image/svg+xml');
        $this->assertStringContainsString('<svg', $response->getContent());
    }

    public function test_member_aid_form_submission_creates_member_and_aid_request(): void
    {
        $payload = [
            'full_name' => 'Ahmad Test',
            'identity_number' => '901234-14-5678',
            'identity_type' => 'MyKad',
            'birth_date' => '1990-01-01',
            'phone' => '0123456789',
            'email' => 'test@example.com',
            'email_confirmation' => 'test@example.com',
            'address' => 'Presint 9, Putrajaya',
            'presint' => 'Presint 9',
            'aid_types' => ['wang_tunai'],
        ];

        $response = $this->postJson('/daftar', $payload);

        $response->assertOk();
        $response->assertJson(['message' => 'Data anda telah diterima.']);

        $this->assertDatabaseHas('members', [
            'full_name' => 'Ahmad Test',
            'identity_number' => '901234-14-5678',
            'identity_type' => 'MyKad',
        ]);

        $member = Member::where('identity_number', '901234-14-5678')->first();
        $this->assertNotNull($member);
        $this->assertCount(1, $member->aidRequests);
        $this->assertSame('wang_tunai', $member->aidRequests->first()->type);
    }

    public function test_hospital_aid_requires_patient_fields(): void
    {
        $payload = [
            'full_name' => 'Ahmad Pesakit',
            'identity_number' => '901234-14-9999',
            'identity_type' => 'MyKad',
            'birth_date' => '1990-01-01',
            'phone' => '0123456789',
            'email' => 'pesakit@example.com',
            'email_confirmation' => 'pesakit@example.com',
            'address' => 'Presint 9, Putrajaya',
            'presint' => 'Presint 9',
            'aid_types' => ['katil_hospital_kerusi_roda'],
        ];

        $response = $this->postJson('/daftar', $payload);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors([
            'patient_name',
            'patient_identity_number',
            'patient_phone',
            'patient_address',
        ]);
    }

    public function test_hospital_aid_stores_patient_fields(): void
    {
        $payload = [
            'full_name' => 'Ahmad Pesakit',
            'identity_number' => '901234-14-8888',
            'identity_type' => 'MyKad',
            'birth_date' => '1990-01-01',
            'phone' => '0123456789',
            'email' => 'pesakit-ok@example.com',
            'email_confirmation' => 'pesakit-ok@example.com',
            'address' => 'Presint 9, Putrajaya',
            'presint' => 'Presint 9',
            'aid_types' => ['katil_hospital_kerusi_roda'],
            'patient_name' => 'Siti Pesakit',
            'patient_identity_number' => '850101-14-1234',
            'patient_phone' => '0198765432',
            'patient_address' => 'Presint 11, Putrajaya',
        ];

        $response = $this->postJson('/daftar', $payload);

        $response->assertOk();

        $member = Member::where('identity_number', '901234-14-8888')->first();
        $this->assertNotNull($member);
        $aid = $member->aidRequests->first();
        $this->assertNotNull($aid);
        $this->assertSame('katil_hospital_kerusi_roda', $aid->type);
        $this->assertSame('Siti Pesakit', $aid->patient_name);
        $this->assertSame('850101-14-1234', $aid->patient_identity_number);
        $this->assertSame('0198765432', $aid->patient_phone);
        $this->assertSame('Presint 11, Putrajaya', $aid->patient_address);
    }
}
