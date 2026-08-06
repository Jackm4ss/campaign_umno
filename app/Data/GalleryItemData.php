<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class GalleryItemData extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $type,
        public readonly string $title,
        public readonly string $src,
        public readonly string $caption,
        public readonly string $category,
        public readonly string $label,
        public readonly ?string $url,
    ) {}
}
