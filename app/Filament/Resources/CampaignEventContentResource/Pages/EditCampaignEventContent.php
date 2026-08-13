<?php

declare(strict_types=1);

namespace App\Filament\Resources\CampaignEventContentResource\Pages;

use App\Filament\Resources\CampaignEventContentResource;
use App\Support\RichArticleContent;
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

        // The editor owns the complete article after save.
        $data['sections'] = [];

        // CTA stays hidden from non-technical admins and keeps its stored value.
        unset($data['cta']);

        // Public label follows the picked date; keep the old one if no date given.
        if (($data['starts_at'] ?? null) !== null && $data['starts_at'] !== '') {
            $data['date_label'] = CreateCampaignEventContent::formatDateLabel((string) $data['starts_at']);
        } else {
            unset($data['starts_at']);
        }

        return $data;
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Seeded records store extra blocks separately. Present them as one simple article.
        $data['lead'] = RichArticleContent::fromLegacySections(
            (string) ($data['lead'] ?? ''),
            $data['sections'] ?? [],
        );
        unset($data['sections']);

        return $data;
    }

    protected function afterSave(): void
    {
        cache()->forget('homepage_data');
    }
}
