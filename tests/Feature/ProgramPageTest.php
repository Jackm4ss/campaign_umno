<?php

namespace Tests\Feature;

use App\Models\Program;
use Database\Seeders\ProgramSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProgramPageTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(ProgramSeeder::class);
    }

    public function test_each_program_detail_page_renders(): void
    {
        foreach (Program::all() as $program) {
            $response = $this->get("/program/{$program->slug}");

            $response->assertOk();
        }
    }

    public function test_unknown_program_slug_returns_not_found(): void
    {
        $this->get('/program/tidak-wujud')->assertNotFound();
    }

    public function test_homepage_renders_with_programs(): void
    {
        $response = $this->get('/');

        $response->assertOk();
    }
}
