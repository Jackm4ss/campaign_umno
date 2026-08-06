<?php

namespace Tests\Feature;

use App\Models\Aspiration;
use App\Models\CampaignEventContent;
use App\Models\Member;
use App\Models\Program;
use App\Models\User;
use Database\Seeders\CampaignEventContentSeeder;
use Database\Seeders\ProgramSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminSmokeTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed([ProgramSeeder::class, CampaignEventContentSeeder::class]);
        $this->admin = User::factory()->create(['email' => 'admin@gmail.org.my']);

        Member::query()->create([
            'full_name' => 'Ahmad Bin Abu',
            'identity_number' => '850101-14-5555',
            'identity_type' => 'MyKad',
            'birth_date' => '1985-01-01',
            'phone' => '0121234567',
            'email' => 'ahmadabu@example.com',
            'address' => 'No 1, Jalan P9A, Putrajaya',
            'presint' => '9',
            'aid_status' => 'belum_ada_tindakan',
            'source' => 'facebook',
        ]);

        Aspiration::query()->create([
            'name' => 'Ahmad Bin Ali',
            'identity_number' => '850101-14-5556',
            'email' => 'ahmad@example.com',
            'phone' => '0131234567',
            'message' => 'Saya mohon bantuan asas dapur.',
            'source' => 'google',
        ]);
    }

    public function test_dashboard_renders_for_admin(): void
    {
        $this->actingAs($this->admin)
            ->get('/admin')
            ->assertOk();
    }

    public function test_admin_pages_render_for_admin(): void
    {
        foreach ([
            '/admin/members',
            '/admin/aspirations',
            '/admin/programs',
            '/admin/campaign-event-contents',
            '/admin/gallery-items',
        ] as $path) {
            $this->actingAs($this->admin)
                ->get($path)
                ->assertOk();
        }
    }

    public function test_member_edit_page_renders(): void
    {
        $member = Member::query()->firstOrFail();

        $this->actingAs($this->admin)
            ->get("/admin/members/{$member->id}/edit")
            ->assertOk();
    }

    public function test_program_edit_page_renders(): void
    {
        $program = Program::query()->firstOrFail();

        $this->actingAs($this->admin)
            ->get("/admin/programs/{$program->id}/edit")
            ->assertOk();
    }

    public function test_campaign_event_edit_page_renders(): void
    {
        $event = CampaignEventContent::query()->firstOrFail();

        $this->actingAs($this->admin)
            ->get("/admin/campaign-event-contents/{$event->id}/edit")
            ->assertOk();
    }

    public function test_guest_is_redirected_to_login(): void
    {
        $this->get('/admin/members')->assertRedirect('/admin/login');
    }
}
