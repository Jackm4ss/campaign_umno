<?php

declare(strict_types=1);

namespace App\Filament\Resources\AspirationResource\Pages;

use App\Filament\Resources\AspirationResource;
use App\Filament\Resources\AspirationResource\Widgets\AspirationStatsWidget;
use Filament\Resources\Pages\ListRecords;

final class ListAspirations extends ListRecords
{
    protected static string $resource = AspirationResource::class;

    protected function getHeaderWidgets(): array
    {
        return [AspirationStatsWidget::class];
    }
}
