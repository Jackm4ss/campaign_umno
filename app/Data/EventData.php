<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class EventData extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly string $category,
        public readonly string $status,
        public readonly string $description,
        public readonly string $date,
        public readonly string $venue,
        public readonly string $address,
        public readonly string $image_url,
        public readonly ?string $map_url,
    ) {}
}
