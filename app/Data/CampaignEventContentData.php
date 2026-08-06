<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class CampaignEventContentData extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $slug,
        public readonly string $title,
        public readonly string $date_label,
        public readonly string $place,
        public readonly string $short_desc,
        public readonly string $image_url,
        public readonly string $lead,
        public readonly array $sections,
        public readonly array $cta,
    ) {}
}
