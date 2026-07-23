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
        $response->assertSee('Katil Hospital');
        $response->assertSee('Makanan Asas');
        $response->assertSee('Wang Tunai RM300');
    }

    public function test_bantuan_qr_returns_svg(): void
    {
        $response = $this->get('/bantuan/qr');

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
            'aid_types' => ['wang_tunai_rm_300'],
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
        $this->assertSame('wang_tunai_rm_300', $member->aidRequests->first()->type);
    }
}
