<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\Aspiration;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\Member;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

final class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Ahli', Member::count())
                ->description('Ahli berdaftar')
                ->icon('heroicon-o-user-group')
                ->color('primary'),
            Stat::make('Aspirasi', Aspiration::count())
                ->description('Aspirasi diterima')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->color('info'),
            Stat::make('Acara', Event::count())
                ->description('Acara kempen')
                ->icon('heroicon-o-calendar-days')
                ->color('success'),
            Stat::make('Pendaftaran', EventRegistration::count())
                ->description('Pendaftaran acara')
                ->icon('heroicon-o-ticket')
                ->color('warning'),
        ];
    }
}
