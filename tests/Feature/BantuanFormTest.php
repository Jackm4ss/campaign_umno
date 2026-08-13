<?php

namespace Tests\Feature;

use App\Enums\AidStatus;
use App\Enums\AidType;
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

        $this->app->bind(TurnstileValidator::class, fn () => new class extends TurnstileValidator
        {
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
    }

    public function test_bantuan_qr_returns_svg(): void
    {
        $response = $this->get('/bantuan/qr-image');

        $response->assertOk();
        $response->assertHeader('Content-Type', 'image/svg+xml');
        $this->assertStringContainsString('<svg', $response->getContent());
    }

    public function test_aspirasi_page_and_qr_page_render(): void
    {
        $this->get('/aspirasi')->assertOk();
        $this->get('/aspirasi/qr')->assertOk();
    }

    public function test_aspirasi_qr_returns_svg(): void
    {
        $response = $this->get('/aspirasi/qr-image');

        $response->assertOk();
        $response->assertHeader('Content-Type', 'image/svg+xml');
        $this->assertStringContainsString('<svg', $response->getContent());
    }

    public function test_member_submission_requires_terms_and_privacy_consent(): void
    {
        $response = $this->postJson('/daftar', [
            'full_name' => 'Pemohon Tanpa Persetujuan',
            'identity_number' => '900101-14-5555',
            'identity_type' => 'MyKad',
            'birth_date' => '1990-01-01',
            'phone' => '0123456789',
            'email' => 'tanpa-consent@example.com',
            'address' => 'Presint 9, Putrajaya',
            'presint' => 'Presint 9',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['terms_accepted', 'privacy_accepted']);
        $this->assertDatabaseMissing('members', ['identity_number' => '900101-14-5555']);
    }

    public function test_aspiration_submission_requires_terms_and_privacy_consent(): void
    {
        $response = $this->postJson('/aspirasi', [
            'name' => 'Aspirasi Tanpa Persetujuan',
            'identity_type' => 'MyKad',
            'identity_number' => '900101146666',
            'email' => 'aspirasi-tanpa-consent@example.com',
            'phone' => '0123456789',
            'message' => 'Aspirasi ujian.',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['terms_accepted', 'privacy_accepted']);
        $this->assertDatabaseMissing('aspirations', ['identity_number' => '900101146666']);
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
            'address' => 'Presint 9, Putrajaya',
            'presint' => 'Presint 9',
            'aid_types' => ['wang_tunai'],
            'terms_accepted' => '1',
            'privacy_accepted' => '1',
        ];

        $response = $this->postJson('/daftar', $payload);

        $response->assertOk();
        $response->assertJson(['message' => 'Data anda telah diterima.']);

        $this->assertDatabaseHas('members', [
            'full_name' => 'Ahmad Test',
            'identity_number' => '901234-14-5678',
            'identity_type' => 'MyKad',
            'aid_status' => AidStatus::BelumAdaTindakan->value,
            'source' => 'direct',
        ]);

        $member = Member::where('identity_number', '901234-14-5678')->first();
        $this->assertNotNull($member);
        $this->assertCount(1, $member->aidRequests);
        $this->assertSame(AidType::WangTunai, $member->aidRequests->first()->type);
    }

    public function test_source_is_stored_from_form(): void
    {
        $payload = [
            'full_name' => 'Siti TikTok',
            'identity_number' => '950101-14-1111',
            'identity_type' => 'MyKad',
            'birth_date' => '1995-01-01',
            'phone' => '0123456789',
            'email' => 'siti@example.com',
            'address' => 'Presint 9, Putrajaya',
            'presint' => 'Presint 9',
            'source' => 'TikTok',
            'terms_accepted' => '1',
            'privacy_accepted' => '1',
        ];

        $response = $this->postJson('/daftar', $payload);

        $response->assertOk();
        $this->assertDatabaseHas('members', ['identity_number' => '950101-14-1111', 'source' => 'tiktok']);
    }

    public function test_unknown_source_is_stored_as_lain_lain(): void
    {
        $payload = [
            'full_name' => 'Ali Unknown',
            'identity_number' => '950102-14-2222',
            'identity_type' => 'MyKad',
            'birth_date' => '1995-01-01',
            'phone' => '0123456789',
            'email' => 'ali@example.com',
            'address' => 'Presint 9, Putrajaya',
            'presint' => 'Presint 9',
            'source' => 'wechat',
            'terms_accepted' => '1',
            'privacy_accepted' => '1',
        ];

        $response = $this->postJson('/daftar', $payload);

        $response->assertOk();
        $this->assertDatabaseHas('members', ['identity_number' => '950102-14-2222', 'source' => 'lain-lain']);
    }

    public function test_duplicate_member_with_received_aid_is_blocked(): void
    {
        Member::query()->create($this->existingMemberAttributes(['aid_status' => AidStatus::Diterima]));

        $response = $this->postJson('/daftar', [
            'full_name' => 'Ahmad Test',
            'identity_number' => '901234-14-5678',
            'identity_type' => 'MyKad',
            'birth_date' => '1990-01-01',
            'phone' => '0123456789',
            'email' => 'test@example.com',
            'address' => 'Presint 9, Putrajaya',
            'presint' => 'Presint 9',
            'aid_types' => ['wang_tunai'],
            'terms_accepted' => '1',
            'privacy_accepted' => '1',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['identity_number']);
        $this->assertSame(1, Member::query()->where('identity_number', '901234-14-5678')->count());
    }

    public function test_duplicate_member_with_completed_aid_is_blocked(): void
    {
        Member::query()->create($this->existingMemberAttributes(['aid_status' => AidStatus::Selesai]));

        $response = $this->postJson('/daftar', [
            'full_name' => 'Ahmad Test',
            'identity_number' => '901234-14-5678',
            'identity_type' => 'MyKad',
            'birth_date' => '1990-01-01',
            'phone' => '0123456789',
            'email' => 'test@example.com',
            'address' => 'Presint 9, Putrajaya',
            'presint' => 'Presint 9',
            'terms_accepted' => '1',
            'privacy_accepted' => '1',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['identity_number']);
    }

    public function test_duplicate_member_with_untreated_aid_is_also_blocked(): void
    {
        Member::query()->create($this->existingMemberAttributes(['aid_status' => AidStatus::BelumAdaTindakan]));

        $response = $this->postJson('/daftar', [
            'full_name' => 'Ahmad Test',
            'identity_number' => '901234-14-5678',
            'identity_type' => 'MyKad',
            'birth_date' => '1990-01-01',
            'phone' => '0123456789',
            'email' => 'test@example.com',
            'address' => 'Presint 9, Putrajaya',
            'presint' => 'Presint 9',
            'terms_accepted' => '1',
            'privacy_accepted' => '1',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['identity_number']);
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
            'address' => 'Presint 9, Putrajaya',
            'presint' => 'Presint 9',
            'aid_types' => ['katil_hospital_kerusi_roda'],
            'terms_accepted' => '1',
            'privacy_accepted' => '1',
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
            'address' => 'Presint 9, Putrajaya',
            'presint' => 'Presint 9',
            'aid_types' => ['katil_hospital_kerusi_roda'],
            'patient_name' => 'Siti Pesakit',
            'patient_identity_number' => '850101-14-1234',
            'patient_phone' => '0198765432',
            'patient_address' => 'Presint 11, Putrajaya',
            'terms_accepted' => '1',
            'privacy_accepted' => '1',
        ];

        $response = $this->postJson('/daftar', $payload);

        $response->assertOk();

        $member = Member::where('identity_number', '901234-14-8888')->first();
        $this->assertNotNull($member);
        $aid = $member->aidRequests->first();
        $this->assertNotNull($aid);
        $this->assertSame(AidType::KatilHospitalKerusiRoda, $aid->type);
        $this->assertSame('Siti Pesakit', $aid->patient_name);
        $this->assertSame('850101-14-1234', $aid->patient_identity_number);
        $this->assertSame('0198765432', $aid->patient_phone);
        $this->assertSame('Presint 11, Putrajaya', $aid->patient_address);
    }

    public function test_aspiration_stores_source(): void
    {
        $payload = [
            'name' => 'Abu Aspirasi',
            'identity_type' => 'MyTentera',
            'identity_number' => '880808144444',
            'email' => 'abu@example.com',
            'phone' => '0123456789',
            'message' => 'Semoga Putrajaya lebih baik.',
            'source' => 'facebook',
            'terms_accepted' => '1',
            'privacy_accepted' => '1',
        ];

        $response = $this->postJson('/aspirasi', $payload);

        $response->assertOk();
        $this->assertDatabaseHas('aspirations', [
            'email' => 'abu@example.com',
            'identity_type' => 'MyTentera',
            'source' => 'facebook',
        ]);
    }

    public function test_aspiration_rejects_unknown_identity_type(): void
    {
        $response = $this->postJson('/aspirasi', [
            'name' => 'Jenis Kad Tidak Sah',
            'identity_type' => 'Passport',
            'identity_number' => '900101145555',
            'email' => 'kad-tidak-sah@example.com',
            'phone' => '0123456789',
            'message' => 'Aspirasi ujian.',
            'terms_accepted' => '1',
            'privacy_accepted' => '1',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['identity_type']);
        $this->assertDatabaseMissing('aspirations', ['email' => 'kad-tidak-sah@example.com']);
    }

    public function test_aspiration_identity_number_must_be_exactly_twelve_digits(): void
    {
        foreach (['12345678901', '1234567890123', '90010114ABCD'] as $index => $identityNumber) {
            $response = $this->postJson('/aspirasi', [
                'name' => 'Format Kad Tidak Sah',
                'identity_type' => 'MyKad',
                'identity_number' => $identityNumber,
                'email' => "format-kad-{$index}@example.com",
                'phone' => '0123456789',
                'message' => 'Aspirasi ujian.',
                'terms_accepted' => '1',
                'privacy_accepted' => '1',
            ]);

            $response->assertStatus(422);
            $response->assertJsonValidationErrors(['identity_number']);
        }
    }

    /**
     * @param  array<string, mixed>  $overrides
     * @return array<string, mixed>
     */
    private function existingMemberAttributes(array $overrides = []): array
    {
        return array_merge([
            'full_name' => 'Ahmad Sedia Ada',
            'identity_number' => '901234-14-5678',
            'identity_type' => 'MyKad',
            'birth_date' => '1990-01-01',
            'phone' => '0123456789',
            'email' => 'sedia-ada@example.com',
            'address' => 'Presint 9, Putrajaya',
            'presint' => 'Presint 9',
            'aid_status' => AidStatus::BelumAdaTindakan,
        ], $overrides);
    }
}
