<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Article;
use App\Models\CampaignEventContent;
use App\Models\Event;
use App\Models\GalleryItem;
use App\Models\Leader;
use App\Models\Program;

final class PublicHomeViewData
{
    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'articles' => $this->articles(),
            'events' => $this->events(),
            'leaders' => $this->leaders(),
            'gallery' => $this->gallery(),
            'programs' => $this->programs(),
            'campaignEvents' => $this->campaignEvents(),
            'settings' => [],
        ];
    }

    /** @return array<int, array<string, mixed>> */
    private function articles(): array
    {
        return Article::query()
            ->published()
            ->latest('published_at')
            ->take(3)
            ->get()
            ->map(fn (Article $a) => [
                'id' => $a->id,
                'title' => $a->title,
                'slug' => $a->slug,
                'author' => $a->author,
                'category' => $a->category ?: 'Artikel',
                'status' => $a->status->value ?? 'draft',
                'date' => $a->published_at?->translatedFormat('d F Y') ?? '',
                'image_url' => $this->assetUrl($a->thumbnail_path, 'assets/article-main.jpg'),
                'body' => $a->content,
            ])
            ->all();
    }

    /** @return array<int, array<string, mixed>> */
    private function events(): array
    {
        return Event::query()
            ->with('category')
            ->latest('starts_at')
            ->take(3)
            ->get()
            ->map(fn (Event $e) => [
                'id' => $e->id,
                'title' => $e->title,
                'category' => $e->category?->name ?? 'Komuniti',
                'status' => $e->status->value ?? 'upcoming',
                'description' => $e->description,
                'date' => $e->starts_at?->translatedFormat('d F Y') ?? '',
                'venue' => $e->venue_name,
                'address' => $e->address,
                'image_url' => $this->assetUrl($e->banner_image, 'assets/event-1.jpg'),
                'map_url' => $e->map_url,
            ])
            ->all();
    }

    /** @return array<int, array<string, mixed>> */
    private function leaders(): array
    {
        return Leader::query()
            ->published()
            ->ordered()
            ->take(4)
            ->get()
            ->map(fn (Leader $l) => [
                'id' => $l->id,
                'name' => $l->full_name,
                'position' => $l->position,
                'image_url' => $this->assetUrl($l->photo_path, 'assets/tengku-adnan-umno.jpg'),
                'bio' => $l->bio,
                'extra_info' => $l->extra_info,
            ])
            ->all();
    }

    /** @return array<int, array<string, mixed>> */
    private function gallery(): array
    {
        $items = GalleryItem::query()
            ->published()
            ->ordered()
            ->take(24)
            ->get();

        if ($items->isNotEmpty()) {
            return $items->map(fn (GalleryItem $item) => [
                'id' => $item->id,
                'type' => $item->type->value ?? 'photo',
                'title' => $item->title,
                'src' => $this->assetUrl($item->image_path, 'assets/event-1.jpg'),
                'caption' => '',
                'category' => str_contains(strtolower($item->type->value ?? ''), 'video') ? 'media' : 'kegiatan',
                'label' => str_contains(strtolower($item->type->value ?? ''), 'video') ? 'Media' : 'Kegiatan',
                'url' => $item->external_url,
            ])->all();
        }

        return $this->defaultGallery();
    }

    /** @return array<int, array<string, mixed>> */
    private function programs(): array
    {
        return Program::query()
            ->published()
            ->ordered()
            ->get()
            ->map(fn (Program $p) => [
                'id' => $p->id,
                'slug' => $p->slug,
                'title' => $p->title,
                'short_desc' => $p->short_desc,
                'image_url' => $this->assetUrl($p->image_path, 'assets/program-sukan.jpg'),
                'lead' => $p->lead,
                'sections' => $p->sections ?? [],
                'cta' => $p->cta ?? [],
            ])
            ->all();
    }

    /** @return array<int, array<string, mixed>> */
    private function campaignEvents(): array
    {
        return CampaignEventContent::query()
            ->published()
            ->ordered()
            ->get()
            ->map(fn (CampaignEventContent $e) => [
                'id' => $e->id,
                'slug' => $e->slug,
                'title' => $e->title,
                'date_label' => $e->date_label,
                'place' => $e->place,
                'short_desc' => $e->short_desc,
                'image_url' => $this->assetUrl($e->image_path, 'assets/event-1.jpg'),
                'lead' => $e->lead,
                'sections' => $e->sections ?? [],
                'cta' => $e->cta ?? [],
            ])
            ->all();
    }

    /** @return array<int, array{src: string, title: string, caption: string, category: string, label: string}> */
    private function defaultGallery(): array
    {
        $items = [
            ['umno-gotong-royong-putraharmoni.jpg', 'Gotong Royong Putra Harmoni', 'Kerja komuniti bersama jentera setempat.', 'kegiatan', 'Kegiatan'],
            ['umno-gotong-royong-surau.jpg', 'Gotong Royong Surau', 'Kerja bakti menjaga ruang ibadah komuniti.', 'kegiatan', 'Kegiatan'],
            ['tba-pek-makanan-ramadan-2025.jpg', 'Pek Makanan Ramadan', 'Bantuan asas kepada warga Putrajaya.', 'komuniti', 'Komuniti'],
            ['umno-ziarah-prihatin-2025.jpg', 'Ziarah Prihatin', 'Lawatan keprihatinan kepada warga memerlukan.', 'komuniti', 'Komuniti'],
            ['adnan-khidmat-2024.jpg', 'Khidmat Rakyat 2024', 'Program khidmat dan kehadiran bersama warga.', 'kegiatan', 'Kegiatan'],
            ['tengku-adnan-umno.jpg', 'Tengku Adnan Tengku Mansor', 'Kepimpinan UMNO Bahagian Putrajaya.', 'kepimpinan', 'Kepimpinan'],
        ];

        return array_map(function (array $row): array {
            [$file, $title, $caption, $category, $label] = $row;

            return [
                'id' => 0,
                'type' => 'photo',
                'src' => asset('assets/'.$file),
                'title' => $title,
                'caption' => $caption,
                'category' => $category,
                'label' => $label,
                'url' => null,
            ];
        }, $items);
    }

    private function assetUrl(?string $path, string $fallback): string
    {
        if ($path === null || $path === '') {
            return asset($fallback);
        }

        if (str_starts_with($path, 'data:') || filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        return asset(ltrim($path, '/'));
    }
}
