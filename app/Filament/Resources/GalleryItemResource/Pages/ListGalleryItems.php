<?php

declare(strict_types=1);

namespace App\Filament\Resources\GalleryItemResource\Pages;

use App\Filament\Resources\GalleryItemResource;
use App\Filament\Resources\GalleryItemResource\Widgets\GalleryStatsWidget;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

final class ListGalleryItems extends ListRecords
{
    protected static string $resource = GalleryItemResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }

    protected function getHeaderWidgets(): array
    {
        return [GalleryStatsWidget::class];
    }
}
