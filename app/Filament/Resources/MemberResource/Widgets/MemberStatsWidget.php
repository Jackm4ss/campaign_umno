<?php

declare(strict_types=1);

namespace App\Filament\Resources\MemberResource\Widgets;

use App\Enums\AidStatus;
use App\Models\Member;
use App\Models\MemberAidRequest;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

final class MemberStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Member', (string) Member::count())
                ->description('Semua pendaftaran ahli')
                ->icon('heroicon-o-user-group')
                ->color('primary'),
            Stat::make('Total Pemohon', (string) MemberAidRequest::query()->distinct('member_id')->count('member_id'))
                ->description('Ahli yang memohon bantuan')
                ->icon('heroicon-o-hand-raised')
                ->color('info'),
            Stat::make('Belum Ditindak', (string) Member::query()->where('aid_status', AidStatus::BelumAdaTindakan)->count())
                ->description('Menunggu tindakan admin')
                ->icon('heroicon-o-clock')
                ->color('danger'),
            Stat::make('Diterima', (string) Member::query()->where('aid_status', AidStatus::Diterima)->count())
                ->description('Permohonan diluluskan')
                ->icon('heroicon-o-check-circle')
                ->color('success'),
        ];
    }
}
