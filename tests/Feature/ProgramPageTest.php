<?php

namespace Tests\Feature;

use App\Support\CampaignPrograms;
use Tests\TestCase;

class ProgramPageTest extends TestCase
{
    public function test_each_program_detail_page_renders(): void
    {
        foreach (CampaignPrograms::all() as $program) {
            $response = $this->get(route('programs.show', $program['slug']));

            $response->assertOk();
            $response->assertSee($program['title'], false);
            $response->assertSee($program['lead'], false);
            $response->assertSee('Program lain', false);
            $response->assertSee('Kembali ke senarai program', false);
        }
    }

    public function test_unknown_program_slug_returns_not_found(): void
    {
        $this->get('/program/tidak-wujud')->assertNotFound();
    }

    public function test_homepage_program_cards_link_to_detail_pages(): void
    {
        $response = $this->get('/');

        $response->assertOk();

        foreach (CampaignPrograms::slugs() as $slug) {
            $response->assertSee(route('programs.show', $slug, false), false);
        }

        $response->assertSee('PROGRAM TAK BANYAK ALASAN', false);
        $response->assertSee('Ketahui lebih', false);
    }

    public function test_join_and_bantuan_copy_updated(): void
    {
        $home = $this->get('/');
        $home->assertOk();
        $home->assertSee('SUARA ANDA, TEKAD KAMI', false);
        $home->assertSee('Hantar aspirasi anda untuk masa depan Putrajaya yang lebih baik.', false);

        $bantuan = $this->get('/bantuan');
        $bantuan->assertOk();
        $bantuan->assertSee('Permohonan anda akan diproses dalam tempoh lima (5) hari bekerja.', false);
        $bantuan->assertSee('E-Mel atau Whatsapp', false);
    }
}
