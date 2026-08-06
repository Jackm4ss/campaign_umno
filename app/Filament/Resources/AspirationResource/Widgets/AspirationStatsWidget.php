<?php

declare(strict_types=1);

namespace App\Filament\Resources\AspirationResource\Widgets;

use App\Models\Aspiration;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

final class AspirationStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Aspirasi', (string) Aspiration::count())
                ->description('Semua aspirasi diterima')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->color('primary'),
            Stat::make('Hari Ini', (string) Aspiration::query()->whereDate('created_at', today())->count())
                ->description('Dihantar hari ini')
                ->icon('heroicon-o-sun')
                ->color('info'),
            Stat::make('Minggu Ini', (string) Aspiration::query()->whereBetween('created_at', [now()->startOfWeek(), now()])->count())
                ->description('Dihantar minggu ini')
                ->icon('heroicon-o-calendar-days')
                ->color('success'),
            Stat::make('Bulan Ini', (string) Aspiration::query()->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count())
                ->description('Dihantar bulan ini')
                ->icon('heroicon-o-chart-bar')
                ->color('warning'),
        ];
    }
}
