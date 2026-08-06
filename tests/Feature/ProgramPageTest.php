<?php

namespace Tests\Feature;

use App\Models\Program;
use Database\Seeders\ProgramSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
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

    public function test_program_detail_siblings_carry_preview_image(): void
    {
        if (Program::query()->count() < 2) {
            $this->markTestSkipped('Needs at least two published programs.');
        }

        $program = Program::query()->published()->ordered()->first();

        $siblingCount = Program::query()->published()->where('slug', '!=', $program->slug)->count();

        $this->get("/program/{$program->slug}")
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
