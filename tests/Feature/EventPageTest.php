<?php

namespace Tests\Feature;

use App\Support\CampaignEvents;
use Tests\TestCase;

class EventPageTest extends TestCase
{
    public function test_each_event_detail_page_renders(): void
    {
        foreach (CampaignEvents::all() as $event) {
            $response = $this->get(route('events.show', $event['slug']));

            $response->assertOk();
            $response->assertSee($event['title'], false);
            $response->assertSee($event['lead'], false);
            $response->assertSee($event['dateLabel'], false);
            $response->assertSee('Acara lain', false);
            $response->assertSee('Kembali ke senarai acara', false);
        }
    }

    public function test_unknown_event_slug_returns_not_found(): void
    {
        $this->get('/acara/tidak-wujud')->assertNotFound();
    }

    public function test_homepage_upcoming_section_links_to_event_details(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('ACARA AKAN DATANG', false);
        $response->assertSee('Detail selengkapnya', false);

        foreach (CampaignEvents::slugs() as $slug) {
            $response->assertSee(route('events.show', $slug, false), false);
        }
    }
}
