<?php

declare(strict_types=1);

namespace App\Filament\Resources\CampaignEventContentResource\Pages;

use App\Filament\Resources\CampaignEventContentResource;
use App\Models\CampaignEventContent;
use Carbon\Carbon;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

final class CreateCampaignEventContent extends CreateRecord
{
    protected static string $resource = CampaignEventContentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = $this->generateUniqueSlug((string) ($data['title'] ?? 'acara'));
        $data['sections'] = $data['sections'] ?? [];
        $data['cta'] = $data['cta'] ?? [];
        $data['date_label'] = self::formatDateLabel($data['starts_at'] ?? null);

        return $data;
    }

    public static function formatDateLabel(?string $startsAt): string
    {
        if ($startsAt === null || $startsAt === '') {
            return '';
        }

        return Carbon::parse($startsAt)->locale('ms')->translatedFormat('j F Y');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    private function generateUniqueSlug(string $title): string
    {
        $base = Str::slug($title);

        if ($base === '') {
            $base = 'acara-'.Str::lower(Str::random(6));
        }

        $slug = $base;
        $suffix = 2;

        while (CampaignEventContent::query()->where('slug', $slug)->exists()) {
            $slug = $base.'-'.$suffix;
            $suffix++;
        }

        return $slug;
    }
}
