<?php

declare(strict_types=1);

namespace App\Filament\Resources\ProgramResource\Pages;

use App\Filament\Resources\ProgramResource;
use App\Filament\Resources\ProgramResource\Widgets\ProgramStatsWidget;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

final class ListPrograms extends ListRecords
{
    protected static string $resource = ProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }

    protected function getHeaderWidgets(): array
    {
        return [ProgramStatsWidget::class];
    }
}
