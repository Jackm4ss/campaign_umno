<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\Aspiration;
use Carbon\CarbonImmutable;
use Filament\Widgets\ChartWidget;

final class AspirationsTrendChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Aspirasi Diterima (12 Minggu Terakhir)';

    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 1;

    protected function getData(): array
    {
        $weeks = collect(range(11, 0))
            ->map(fn (int $i) => CarbonImmutable::now()->startOfWeek()->subWeeks($i));

        $rows = Aspiration::query()
            ->where('created_at', '>=', $weeks->first())
            ->get(['created_at'])
            ->groupBy(fn (Aspiration $aspiration) => CarbonImmutable::parse($aspiration->created_at)->startOfWeek()->toDateString())
            ->map->count();

        return [
            'labels' => $weeks->map(fn (CarbonImmutable $week) => $week->translatedFormat('d M'))->all(),
            'datasets' => [
                [
                    'label' => 'Aspirasi',
                    'data' => $weeks->map(fn (CarbonImmutable $week) => $rows->get($week->toDateString(), 0))->all(),
                    'borderColor' => '#1A3C9E',
                    'backgroundColor' => 'rgba(26, 60, 158, 0.1)',
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
