<?php

declare(strict_types=1);

namespace App\Filament\Resources\AspirationResource\Pages;

use App\Filament\Resources\AspirationResource;
use Filament\Resources\Pages\ListRecords;

final class ListAspirations extends ListRecords
{
    protected static string $resource = AspirationResource::class;
}
