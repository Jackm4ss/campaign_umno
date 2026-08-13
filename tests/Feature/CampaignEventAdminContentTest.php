<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Filament\Resources\CampaignEventContentResource\Pages\CreateCampaignEventContent;
use App\Filament\Resources\CampaignEventContentResource\Pages\EditCampaignEventContent;
use App\Models\CampaignEventContent;
use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

final class CampaignEventAdminContentTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Filament::setCurrentPanel(Filament::getPanel('admin'));
        $this->actingAs(User::factory()->create());
    }

    public function test_admin_can_create_event_with_one_article_editor(): void
    {
        $article = '<p>Pengenalan acara.</p><h2>Agenda utama</h2><ul><li>Aktiviti pertama.</li><li>Aktiviti kedua.</li></ul>';

        Livewire::test(CreateCampaignEventContent::class)
            ->fillForm([
                'title' => 'Acara Ujian CMS',
                'starts_at' => '2026-09-15',
                'place' => 'Putrajaya',
                'short_desc' => 'Penerangan ringkas acara ujian.',
                'lead' => $article,
                'is_published' => true,
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $event = CampaignEventContent::query()->where('title', 'Acara Ujian CMS')->firstOrFail();

        $this->assertSame('acara-ujian-cms', $event->slug);
        $this->assertSame('15 September 2026', $event->date_label);
        $this->assertSame($article, $event->lead);
        $this->assertSame([], $event->sections);
        $this->assertSame([], $event->cta);
    }

    public function test_admin_edits_seeded_event_in_one_editor_without_changing_cta(): void
    {
        $cta = [
            'primary' => ['label' => 'Sertai Acara', 'href' => 'sertai'],
            'secondary' => ['label' => 'Lihat semua acara', 'href' => 'acara-list'],
        ];

        $event = CampaignEventContent::query()->create([
            'slug' => 'acara-seeder',
            'title' => 'Acara Seeder',
            'date_label' => '15 September 2026',
            'starts_at' => '2026-09-15',
            'place' => 'Presint 1',
            'short_desc' => 'Penerangan asal.',
            'lead' => 'Pengenalan asal.',
            'sections' => [
                [
                    'heading' => 'Agenda asal',
                    'paragraphs' => ['Perenggan asal.'],
                    'bullets' => ['Aktiviti asal.'],
                ],
            ],
            'cta' => $cta,
            'sort_order' => 1,
            'is_published' => true,
        ]);

        $expectedEditorContent = '<p>Pengenalan asal.</p>'
            .'<h2>Agenda asal</h2>'
            .'<p>Perenggan asal.</p>'
            .'<ul><li>Aktiviti asal.</li></ul>';
        $updatedArticle = '<p>Pengenalan baharu.</p><h2>Agenda baharu</h2><ul><li>Aktiviti satu.</li><li>Aktiviti dua.</li></ul>';

        Livewire::test(EditCampaignEventContent::class, ['record' => $event->getRouteKey()])
            ->assertFormSet([
                'lead' => $expectedEditorContent,
            ])
            ->fillForm([
                'title' => 'Acara Seeder Dikemas Kini',
                'starts_at' => '2026-10-01',
                'place' => 'Presint 2',
                'short_desc' => 'Penerangan baharu.',
                'lead' => $updatedArticle,
                'is_published' => true,
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $event->refresh();

        $this->assertSame('acara-seeder', $event->slug);
        $this->assertSame('1 Oktober 2026', $event->date_label);
        $this->assertSame($updatedArticle, $event->lead);
        $this->assertSame([], $event->sections);
        $this->assertSame($cta, $event->cta);
    }
}
