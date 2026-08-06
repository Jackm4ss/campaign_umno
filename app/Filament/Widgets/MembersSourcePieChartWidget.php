<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\Member;
use App\Support\SubmissionSources;
use Filament\Widgets\ChartWidget;

final class MembersSourcePieChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Anggota Mengikut Sumber Pendaftaran';

    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 1;

    protected function getData(): array
    {
        $rows = Member::query()
            ->selectRaw('source, COUNT(*) as total')
            ->groupBy('source')
            ->pluck('total', 'source');

        $keys = $rows->keys()->all();

        return [
            'labels' => array_map(fn (string $key) => SubmissionSources::label($key), $keys),
            'datasets' => [
                [
                    'label' => 'Anggota',
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
