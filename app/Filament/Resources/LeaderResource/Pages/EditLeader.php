<?php

declare(strict_types=1);

namespace App\Filament\Resources\LeaderResource\Pages;

use App\Filament\Resources\LeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

final class EditLeader extends EditRecord
{
    protected static string $resource = LeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }

    protected function afterSave(): void
    {
        cache()->forget('homepage_data');
    }
}
