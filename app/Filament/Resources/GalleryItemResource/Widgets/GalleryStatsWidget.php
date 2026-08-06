<?php

declare(strict_types=1);

namespace App\Filament\Resources\GalleryItemResource\Widgets;

use App\Enums\GalleryType;
use App\Models\GalleryItem;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

final class GalleryStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Galeri', (string) GalleryItem::count())
                ->description('Semua item galeri')
                ->icon('heroicon-o-photo')
                ->color('primary'),
            Stat::make('Foto', (string) GalleryItem::query()->where('type', GalleryType::Photo)->count())
                ->description('Item berjenis foto')
                ->icon('heroicon-o-camera')
                ->color('info'),
            Stat::make('Video / Media Sosial', (string) GalleryItem::query()->where('type', '!=', GalleryType::Photo)->count())
                ->description('YouTube, TikTok, Instagram, Facebook')
                ->icon('heroicon-o-play-circle')
                ->color('warning'),
            Stat::make('Published', (string) GalleryItem::query()->where('is_published', true)->count())
                ->description('Terbit di laman awam')
                ->icon('heroicon-o-check-circle')
                ->color('success'),
        ];
    }
}
