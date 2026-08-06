<?php

declare(strict_types=1);

namespace App\Filament\Resources\LeaderResource\Pages;

use App\Filament\Resources\LeaderResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateLeader extends CreateRecord
{
    protected static string $resource = LeaderResource::class;
}
