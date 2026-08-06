<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\CampaignEventContent;
use App\Models\GalleryItem;
use App\Models\Program;

final class PublicHomeViewData
{
    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'gallery' => $this->gallery(),
            'programs' => $this->programs(),
            'campaignEvents' => $this->campaignEvents(),
            'settings' => [],
        ];
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
                'src' => $this->mediaOrPath($item, 'image', 'assets/event-1.jpg'),
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
                'image_url' => $this->mediaOrPath($p, 'cover', 'assets/program-sukan.jpg'),
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
                'image_url' => $this->mediaOrPath($e, 'banner', 'assets/event-1.jpg'),
                'lead' => $e->lead,
                'sections' => $e->sections ?? [],
                'cta' => $e->cta ?? [],
            ])
            ->all();
    }

    /** @return array<int, array{id: int, type: string, src: string, title: string, caption: string, category: string, label: string, url: null}> */
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

    /**
     * Prefer Spatie MediaLibrary upload (admin panel), fall back to legacy image path.
     */
    private function mediaOrPath(GalleryItem|Program|CampaignEventContent $model, string $collection, string $fallback): string
    {
        $mediaUrl = $model->getFirstMediaUrl($collection, 'webp');
        if ($mediaUrl !== '') {
            return $mediaUrl;
        }

        $path = match (true) {
            $model instanceof GalleryItem => $model->image_path,
            $model instanceof Program => $model->image_path,
            $model instanceof CampaignEventContent => $model->image_path,
        };

        return $this->assetUrl($path, $fallback);
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
