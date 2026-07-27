<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Controllers\AdminSyncController;

final class PublicHomeViewData
{
    /** @return array{articles: array<int, array<string, mixed>>, events: array<int, array<string, mixed>>, leaders: array<int, array<string, mixed>>, gallery: array<int, array<string, string>>, settings: array<string, mixed>} */
    public function toArray(): array
    {
        $payload = AdminSyncController::publicPayload();

        return [
            'articles' => $this->items($payload['tbaAdminArticles'] ?? null, 3),
            'events' => $this->items($payload['tbaAdminEvents'] ?? null, 3, 'assets/adnan-khidmat-2024.jpg'),
            'leaders' => $this->items($payload['tbaAdminLeaders'] ?? null, 4, 'assets/tengku-adnan-umno.jpg'),
            'gallery' => $this->galleryItems($payload),
            'settings' => $this->valueAsArray($payload['tbaSettings'] ?? null),
        ];
    }

    /**
     * Homepage gallery: all campaign visuals live here (not in content sections).
     *
     * @return array<int, array{src: string, title: string, caption: string, category: string, label: string}>
     */
    private function galleryItems(array $payload): array
    {
        $fromAdmin = $this->items($payload['tbaAdminGallery'] ?? null, 24);

        if ($fromAdmin !== []) {
            $mapped = [];

            foreach ($fromAdmin as $index => $item) {
                $title = (string) ($item['title'] ?? 'Dokumentasi kempen');
                $type = strtolower((string) ($item['type'] ?? 'photo'));
                $category = match (true) {
                    str_contains($type, 'video'), str_contains($type, 'youtube'), str_contains($type, 'tiktok') => 'media',
                    default => 'kegiatan',
                };

                $mapped[] = [
                    'src' => $this->imageUrl($item['image'] ?? $item['image_path'] ?? null, 'assets/event-1.jpg'),
                    'title' => $title,
                    'caption' => (string) ($item['desc'] ?? $item['caption'] ?? ''),
                    'category' => $category,
                    'label' => $category === 'media' ? 'Media' : 'Kegiatan',
                ];
            }

            return $mapped;
        }

        return $this->defaultGallery();
    }

    /**
     * Curated defaults moved off homepage sections (activities / leaders / aspirations).
     *
     * @return array<int, array{src: string, title: string, caption: string, category: string, label: string}>
     */
    private function defaultGallery(): array
    {
        $items = [
            ['umno-gotong-royong-putraharmoni.jpg', 'Gotong Royong Putra Harmoni', 'Kerja komuniti bersama jentera setempat.', 'kegiatan', 'Kegiatan'],
            ['umno-gotong-royong-surau.jpg', 'Gotong Royong Surau', 'Kerja bakti menjaga ruang ibadah komuniti.', 'kegiatan', 'Kegiatan'],
            ['umno-gotong-royong-kerja.jpg', 'Kerja Akar Umbi', 'Turun padang dan bantu terus di lapangan.', 'kegiatan', 'Kegiatan'],
            ['umno-gotong-royong-kumpulan.jpg', 'Pasukan Komuniti', 'Jentera akar umbi bergerak sebagai satu pasukan.', 'komuniti', 'Komuniti'],
            ['tba-pek-makanan-ramadan-2025.jpg', 'Pek Makanan Ramadan', 'Bantuan asas kepada warga Putrajaya.', 'komuniti', 'Komuniti'],
            ['umno-pemuda-pek-makanan-2025.jpg', 'Pemuda & Bantuan Makanan', 'Inisiatif pemuda untuk kebajikan setempat.', 'komuniti', 'Komuniti'],
            ['umno-ziarah-prihatin-2025.jpg', 'Ziarah Prihatin', 'Lawatan keprihatinan kepada warga memerlukan.', 'komuniti', 'Komuniti'],
            ['adnan-khidmat-2024.jpg', 'Khidmat Rakyat 2024', 'Program khidmat dan kehadiran bersama warga.', 'kegiatan', 'Kegiatan'],
            ['adnan-sumbangan-2025.jpeg', 'Sumbangan Demi Rakyat', 'Bantuan dan sumbangan untuk komuniti Putrajaya.', 'kegiatan', 'Kegiatan'],
            ['adnan-ramadan-2026.jpeg', 'Program Ramadan', 'Kebersamaan bulan Ramadan bersama masyarakat.', 'komuniti', 'Komuniti'],
            ['aspirasi-warga-putrajaya-1.jpg', 'Aspirasi Warga I', 'Suara dan keperluan warga didengar terus.', 'media', 'Media'],
            ['aspirasi-warga-putrajaya-2.jpg', 'Aspirasi Warga II', 'Dialog dan maklum balas di peringkat tempatan.', 'media', 'Media'],
            ['aspirasi-warga-putrajaya-3.jpg', 'Aspirasi Warga III', 'Rakyat jadi asas setiap keputusan kempen.', 'media', 'Media'],
            ['tengku-adnan-umno.jpg', 'Tengku Adnan Tengku Mansor', 'Kepimpinan UMNO Bahagian Putrajaya.', 'kepimpinan', 'Kepimpinan'],
            ['adnan-profile.jpg', 'Profil Kepimpinan', 'Wajah jentera dan hala tuju kempen.', 'kepimpinan', 'Kepimpinan'],
            ['tengku-muhammad-hafiz.jpg', 'Tengku Muhammad Hafiz', 'Generasi muda dalam barisan kepimpinan.', 'kepimpinan', 'Kepimpinan'],
            ['tengku-hafiz-turun-padang.jpg', 'Turun Padang', 'Kehadiran di lapangan bersama warga.', 'kepimpinan', 'Kepimpinan'],
            ['tengku-hafiz-majlis-putrajaya.jpg', 'Majlis Putrajaya', 'Majlis dan program rasmi di Putrajaya.', 'media', 'Media'],
            ['hafiz-khidmat-bakti-2024.jpg', 'Khidmat Bakti', 'Program bakti yang memberi manfaat sebenar.', 'kegiatan', 'Kegiatan'],
            ['tba-inisiatif-warga-2024.jpg', 'Inisiatif Warga', 'Inisiatif bersama untuk warga Putrajaya.', 'komuniti', 'Komuniti'],
            ['community-umno.jpg', 'Komuniti UMNO', 'Jaringan komuniti dan kerja berpasukan.', 'komuniti', 'Komuniti'],
            ['pemuda-umno-pelantikan.jpg', 'Pelantikan Pemuda', 'Penyusunan jentera pemuda untuk gerak kerja.', 'kepimpinan', 'Kepimpinan'],
            ['event-1.jpg', 'Program Komuniti', 'Dokumentasi program di peringkat tempatan.', 'kegiatan', 'Kegiatan'],
            ['event-2.jpg', 'Program Kempen', 'Momen gerak kerja kempen Tak Banyak Alasan.', 'kegiatan', 'Kegiatan'],
        ];

        return array_map(function (array $row): array {
            [$file, $title, $caption, $category, $label] = $row;

            return [
                'src' => asset('assets/'.$file),
                'title' => $title,
                'caption' => $caption,
                'category' => $category,
                'label' => $label,
            ];
        }, $items);
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
