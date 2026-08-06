<?php

declare(strict_types=1);

namespace App\Filament\Resources\ProgramResource\Widgets;

use App\Models\Program;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

final class ProgramStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Program', (string) Program::count())
                ->description('Semua program kempen')
                ->icon('heroicon-o-flag')
                ->color('primary'),
            Stat::make('Published', (string) Program::query()->where('is_published', true)->count())
                ->description('Terbit di laman awam')
                ->icon('heroicon-o-check-circle')
                ->color('success'),
            Stat::make('Unpublished', (string) Program::query()->where('is_published', false)->count())
                ->description('Tidak dipaparkan')
                ->icon('heroicon-o-eye-slash')
                ->color('danger'),
        ];
    }
}
