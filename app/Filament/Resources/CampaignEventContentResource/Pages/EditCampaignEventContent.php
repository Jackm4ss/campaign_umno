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

        // Public label follows the picked date; keep the old one if no date given.
        if (($data['starts_at'] ?? null) !== null && $data['starts_at'] !== '') {
            $data['date_label'] = CreateCampaignEventContent::formatDateLabel((string) $data['starts_at']);
        } else {
            unset($data['starts_at']);
        }

        return $data;
    }

    protected function afterSave(): void
    {
        cache()->forget('homepage_data');
    }
}
