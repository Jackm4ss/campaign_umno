<?php

declare(strict_types=1);

namespace App\Filament\Resources\ProgramResource\Pages;

use App\Filament\Resources\ProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

final class EditProgram extends EditRecord
{
    protected static string $resource = ProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Slug never changes after creation.
        unset($data['slug']);

        // Kandungan Tambahan fields are not exposed in the form; keep stored values.
        unset($data['sections'], $data['cta']);

        return $data;
    }

    protected function afterSave(): void
    {
        cache()->forget('homepage_data');
    }
}
