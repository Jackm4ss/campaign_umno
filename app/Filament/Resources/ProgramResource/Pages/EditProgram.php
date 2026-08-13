<?php

declare(strict_types=1);

namespace App\Filament\Resources\ProgramResource\Pages;

use App\Filament\Resources\ProgramResource;
use App\Support\RichArticleContent;
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

        // The editor owns the complete article after save.
        $data['sections'] = [];

        // CTA stays automatic and is not exposed to non-technical admins.
        unset($data['cta']);

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
