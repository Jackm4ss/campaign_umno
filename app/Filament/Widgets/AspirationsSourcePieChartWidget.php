<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\Aspiration;
use App\Support\SubmissionSources;
use Filament\Widgets\ChartWidget;

final class AspirationsSourcePieChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Aspirasi Mengikut Sumber';

    protected static ?int $sort = 4;

    protected int|string|array $columnSpan = 1;

    protected function getData(): array
    {
        $rows = Aspiration::query()
            ->selectRaw('source, COUNT(*) as total')
            ->groupBy('source')
            ->pluck('total', 'source');

        $keys = $rows->keys()->all();

        return [
            'labels' => array_map(fn (string $key) => SubmissionSources::label($key), $keys),
            'datasets' => [
                [
                    'label' => 'Aspirasi',
                    'data' => $rows->values()->all(),
                    'backgroundColor' => array_map(
                        fn (string $key) => SubmissionSources::colors()[$key] ?? '#94a3b8',
                        $keys
                    ),
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
