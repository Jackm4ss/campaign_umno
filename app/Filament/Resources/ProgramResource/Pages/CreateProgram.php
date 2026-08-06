<?php

declare(strict_types=1);

namespace App\Filament\Resources\ProgramResource\Pages;

use App\Filament\Resources\ProgramResource;
use App\Models\Program;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

final class CreateProgram extends CreateRecord
{
    protected static string $resource = ProgramResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = $this->generateUniqueSlug((string) ($data['title'] ?? 'program'));
        $data['sections'] = $data['sections'] ?? [];
        $data['cta'] = $data['cta'] ?? [];

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    private function generateUniqueSlug(string $title): string
    {
        $base = Str::slug($title);

        if ($base === '') {
            $base = 'program-'.Str::lower(Str::random(6));
        }

        $slug = $base;
        $suffix = 2;

        while (Program::query()->where('slug', $slug)->exists()) {
            $slug = $base.'-'.$suffix;
            $suffix++;
        }

        return $slug;
    }
}
