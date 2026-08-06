<?php

namespace Tests\Feature;

use App\Models\CampaignEventContent;
use Database\Seeders\CampaignEventContentSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventPageTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(CampaignEventContentSeeder::class);
    }

    public function test_each_event_detail_page_renders(): void
    {
        foreach (CampaignEventContent::all() as $event) {
            $response = $this->get("/acara/{$event->slug}");

            $response->assertOk();
        }
    }

    public function test_unknown_event_slug_returns_not_found(): void
    {
        $this->get('/acara/tidak-wujud')->assertNotFound();
    }

    public function test_homepage_renders_with_campaign_events(): void
    {
        $response = $this->get('/');

        $response->assertOk();
    }
}
