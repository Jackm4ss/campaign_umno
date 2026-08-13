<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Filament\Resources\ProgramResource\Pages\CreateProgram;
use App\Filament\Resources\ProgramResource\Pages\EditProgram;
use App\Models\Program;
use App\Models\User;
use App\Support\ProgramContent;
use Filament\Facades\Filament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

final class ProgramAdminContentTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Filament::setCurrentPanel(Filament::getPanel('admin'));
        $this->actingAs(User::factory()->create());
    }

    public function test_admin_can_create_program_with_one_article_editor(): void
    {
        Livewire::test(CreateProgram::class)
            ->fillForm([
                'title' => 'Program Ujian CMS',
                'short_desc' => 'Penerangan ringkas program ujian.',
                'lead' => '<p>Pengenalan program.</p><h2>Apa yang kami gerakkan</h2><ul><li>Poin pertama.</li><li>Poin kedua.</li></ul>',
                'is_published' => true,
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $program = Program::query()->where('title', 'Program Ujian CMS')->firstOrFail();

        $this->assertSame('program-ujian-cms', $program->slug);
        $this->assertSame('<p>Pengenalan program.</p><h2>Apa yang kami gerakkan</h2><ul><li>Poin pertama.</li><li>Poin kedua.</li></ul>', $program->lead);
        $this->assertSame([], $program->sections);
        $this->assertSame(ProgramContent::defaultCta(), $program->cta);
    }

    public function test_admin_edits_seeded_content_in_one_editor_without_changing_cta(): void
    {
        $cta = [
            'primary' => ['label' => 'Borang Bantuan', 'href' => 'bantuan'],
            'secondary' => ['label' => 'Lihat semua program', 'href' => 'program-list'],
        ];

        $program = Program::query()->create([
            'slug' => 'program-seeder',
            'title' => 'Program Seeder',
            'short_desc' => 'Penerangan asal.',
            'lead' => 'Pengenalan asal.',
            'sections' => [
                [
                    'heading' => 'Fokus asal',
                    'paragraphs' => ['Perenggan asal.'],
                    'bullets' => ['Poin asal.'],
                ],
            ],
            'cta' => $cta,
            'sort_order' => 1,
            'is_published' => true,
        ]);

        $expectedEditorContent = '<p>Pengenalan asal.</p>'
            .'<h2>Fokus asal</h2>'
            .'<p>Perenggan asal.</p>'
            .'<ul><li>Poin asal.</li></ul>';

        Livewire::test(EditProgram::class, ['record' => $program->getRouteKey()])
            ->assertFormSet([
                'lead' => $expectedEditorContent,
            ])
            ->fillForm([
                'title' => 'Program Seeder Dikemas Kini',
                'short_desc' => 'Penerangan baharu.',
                'lead' => '<p>Pengenalan baharu.</p><h2>Fokus baharu</h2><ul><li>Poin satu.</li><li>Poin dua.</li></ul>',
                'is_published' => true,
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $program->refresh();

        $this->assertSame('program-seeder', $program->slug);
        $this->assertSame('<p>Pengenalan baharu.</p><h2>Fokus baharu</h2><ul><li>Poin satu.</li><li>Poin dua.</li></ul>', $program->lead);
        $this->assertSame([], $program->sections);
        $this->assertSame($cta, $program->cta);
    }
}
