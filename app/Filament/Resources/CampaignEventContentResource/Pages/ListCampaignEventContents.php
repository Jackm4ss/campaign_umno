<?php

declare(strict_types=1);

namespace App\Filament\Resources\CampaignEventContentResource\Pages;

use App\Filament\Resources\CampaignEventContentResource;
use App\Filament\Resources\CampaignEventContentResource\Widgets\CampaignEventStatsWidget;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

final class ListCampaignEventContents extends ListRecords
{
    protected static string $resource = CampaignEventContentResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }

    protected function getHeaderWidgets(): array
    {
        return [CampaignEventStatsWidget::class];
    }
}
