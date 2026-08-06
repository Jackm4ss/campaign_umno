<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class LeaderData extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $position,
        public readonly string $image_url,
        public readonly string $bio,
        public readonly ?string $extra_info,
    ) {}
}
