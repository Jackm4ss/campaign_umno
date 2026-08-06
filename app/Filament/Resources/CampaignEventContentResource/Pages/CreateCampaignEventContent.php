<?php

declare(strict_types=1);

namespace App\Filament\Resources\CampaignEventContentResource\Pages;

use App\Filament\Resources\CampaignEventContentResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateCampaignEventContent extends CreateRecord
{
    protected static string $resource = CampaignEventContentResource::class;
}
