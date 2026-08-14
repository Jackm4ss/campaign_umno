<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\GalleryType;
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

        return $items->map(fn (GalleryItem $item) => [
            'id' => $item->id,
            'type' => $item->type->value ?? 'photo',
            'title' => $item->title,
            'src' => $item->type !== GalleryType::Photo
                ? ($item->getFirstMediaUrl('image', 'webp') ?: ($item->image_path ? $this->assetUrl($item->image_path, '') : ''))
                : $this->mediaOrPath($item, 'image', 'assets/event-1.jpg'),
            'caption' => '',
            'category' => $item->type !== GalleryType::Photo ? 'media' : 'kegiatan',
            'label' => $item->type !== GalleryType::Photo ? $item->type->label() : '',
            'url' => $item->external_url,
        ])->all();
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
                'starts_at' => $this->eventDate($e),
                'place' => $e->place,
                'short_desc' => $e->short_desc,
                'image_url' => $this->mediaOrPath($e, 'banner', 'assets/event-1.jpg'),
                'lead' => $e->lead,
                'sections' => $e->sections ?? [],
                'cta' => $e->cta ?? [],
            ])
            ->all();
    }

    private function eventDate(CampaignEventContent $event): ?string
    {
        if ($event->starts_at !== null) {
            return $event->starts_at->format('Y-m-d');
        }

        if (! preg_match('/^(\d{1,2})\s+(\p{L}+)\s+(\d{4})$/u', trim($event->date_label), $matches)) {
            return null;
        }

        $months = [
            'januari' => 1, 'februari' => 2, 'mac' => 3, 'april' => 4,
            'mei' => 5, 'jun' => 6, 'julai' => 7, 'ogos' => 8,
            'september' => 9, 'oktober' => 10, 'november' => 11, 'disember' => 12,
        ];
        $month = $months[mb_strtolower($matches[2])] ?? null;
        $day = (int) $matches[1];
        $year = (int) $matches[3];

        if ($month === null || ! checkdate($month, $day, $year)) {
            return null;
        }

        return sprintf('%04d-%02d-%02d', $year, $month, $day);
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
