<?php

namespace Tests\Feature;

use App\Models\CampaignEventContent;
use Database\Seeders\CampaignEventContentSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
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

    public function test_event_detail_siblings_carry_preview_image(): void
    {
        if (CampaignEventContent::query()->count() < 2) {
            $this->markTestSkipped('Needs at least two published campaign events.');
        }

        $event = CampaignEventContent::query()->published()->ordered()->first();

        $siblingCount = CampaignEventContent::query()->published()->where('slug', '!=', $event->slug)->count();

        $this->get("/acara/{$event->slug}")
            ->assertOk()
            ->assertInertia(function (Assert $page) use ($siblingCount) {
                $page->has('siblings', $siblingCount);

                for ($i = 0; $i < $siblingCount; $i++) {
                    $page->has("siblings.$i.slug")
                        ->has("siblings.$i.title")
                        ->where("siblings.$i.image_url", fn (string $url) => $url !== '');
                }

                return $page;
            });
    }
}
