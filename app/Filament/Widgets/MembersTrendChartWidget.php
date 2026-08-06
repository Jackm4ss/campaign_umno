<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\Member;
use Carbon\CarbonImmutable;
use Filament\Widgets\ChartWidget;

final class MembersTrendChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Anggota Baru (12 Minggu Terakhir)';

    protected static ?int $sort = 1;

    protected int|string|array $columnSpan = 1;

    protected function getData(): array
    {
        $weeks = collect(range(11, 0))
            ->map(fn (int $i) => CarbonImmutable::now()->startOfWeek()->subWeeks($i));

        $rows = Member::query()
            ->where('created_at', '>=', $weeks->first())
            ->get(['created_at'])
            ->groupBy(fn (Member $member) => CarbonImmutable::parse($member->created_at)->startOfWeek()->toDateString())
            ->map->count();

        return [
            'labels' => $weeks->map(fn (CarbonImmutable $week) => $week->translatedFormat('d M'))->all(),
            'datasets' => [
                [
                    'label' => 'Anggota baru',
                    'data' => $weeks->map(fn (CarbonImmutable $week) => $rows->get($week->toDateString(), 0))->all(),
                    'borderColor' => '#CC1A1A',
                    'backgroundColor' => 'rgba(204, 26, 26, 0.1)',
                    'fill' => true,
                    'tension' => 0.3,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => ['stepSize' => 1],
                ],
            ],
        ];
    }
}
