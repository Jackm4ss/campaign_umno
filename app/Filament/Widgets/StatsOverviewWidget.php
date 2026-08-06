<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\Aspiration;
use App\Models\CampaignEventContent;
use App\Models\Member;
use App\Models\Program;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

final class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Members', Member::count())
                ->description('Registered members')
                ->icon('heroicon-o-user-group')
                ->color('primary'),
            Stat::make('Aspirations', Aspiration::count())
                ->description('Aspirations received')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->color('info'),
            Stat::make('Programs', Program::count())
                ->description('Campaign programs')
                ->icon('heroicon-o-flag')
                ->color('success'),
            Stat::make('Campaign Events', CampaignEventContent::count())
                ->description('Published campaign events')
                ->icon('heroicon-o-megaphone')
                ->color('warning'),
        ];
    }
}
