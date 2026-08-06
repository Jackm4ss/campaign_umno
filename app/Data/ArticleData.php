<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class ArticleData extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly string $slug,
        public readonly string $author,
        public readonly string $category,
        public readonly string $status,
        public readonly string $date,
        public readonly string $image_url,
        public readonly string $body,
    ) {}
}
