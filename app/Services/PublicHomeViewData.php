<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Controllers\AdminSyncController;

final class PublicHomeViewData
{
    /** @return array{articles: array<int, array<string, mixed>>, events: array<int, array<string, mixed>>, leaders: array<int, array<string, mixed>>, settings: array<string, mixed>} */
    public function toArray(): array
    {
        $payload = AdminSyncController::publicPayload();

        return [
            'articles' => $this->items($payload['tbaAdminArticles'] ?? null, 3),
            'events' => $this->items($payload['tbaAdminEvents'] ?? null, 3, 'assets/adnan-khidmat-2024.jpg'),
            'leaders' => $this->items($payload['tbaAdminLeaders'] ?? null, 4, 'assets/tengku-adnan-umno.jpg'),
            'settings' => $this->valueAsArray($payload['tbaSettings'] ?? null),
        ];
    }

    /** @return array<int, array<string, mixed>> */
    private function items(mixed $value, int $limit, ?string $imageFallback = null): array
    {
        $items = array_values(array_filter(
            array_map(
                static fn (mixed $item): array => is_array($item) ? $item : [],
                array_slice($this->valueAsArray($value), 0, $limit),
            ),
            static fn (array $item): bool => $item !== [],
        ));

        if ($imageFallback === null) {
            return $items;
        }

        return array_map(function (array $item) use ($imageFallback): array {
            $item['image_url'] = $this->imageUrl($item['image'] ?? null, $imageFallback);

            return $item;
        }, $items);
    }

    /** @return array<string|int, mixed> */
    private function valueAsArray(mixed $value): array
    {
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            $value = json_last_error() === JSON_ERROR_NONE ? $decoded : [];
        }

        return is_array($value) ? $value : [];
    }

    private function imageUrl(mixed $path, string $fallback): string
    {
        $path = is_string($path) && $path !== '' ? $path : $fallback;

        if (str_starts_with($path, 'data:') || filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        return asset(ltrim($path, '/'));
    }
}
