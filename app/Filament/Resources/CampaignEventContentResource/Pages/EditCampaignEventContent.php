<?php

declare(strict_types=1);

namespace App\Filament\Resources\CampaignEventContentResource\Pages;

use App\Filament\Resources\CampaignEventContentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

final class EditCampaignEventContent extends EditRecord
{
    protected static string $resource = CampaignEventContentResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }

    protected function afterSave(): void
    {
        cache()->forget('homepage_data');
    }
}
