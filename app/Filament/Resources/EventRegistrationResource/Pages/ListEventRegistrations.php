<?php

declare(strict_types=1);

namespace App\Filament\Resources\EventRegistrationResource\Pages;

use App\Filament\Resources\EventRegistrationResource;
use Filament\Resources\Pages\ListRecords;

final class ListEventRegistrations extends ListRecords
{
    protected static string $resource = EventRegistrationResource::class;
}
