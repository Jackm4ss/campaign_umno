<?php

declare(strict_types=1);

namespace App\Filament\Resources\CampaignEventContentResource\Widgets;

use App\Models\CampaignEventContent;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

final class CampaignEventStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Campaign Event', (string) CampaignEventContent::count())
                ->description('Semua acara kempen')
                ->icon('heroicon-o-megaphone')
                ->color('primary'),
            Stat::make('Published', (string) CampaignEventContent::query()->where('is_published', true)->count())
                ->description('Terbit di laman awam')
                ->icon('heroicon-o-check-circle')
                ->color('success'),
            Stat::make('Unpublished', (string) CampaignEventContent::query()->where('is_published', false)->count())
                ->description('Tidak dipaparkan')
                ->icon('heroicon-o-eye-slash')
                ->color('danger'),
        ];
    }
}
