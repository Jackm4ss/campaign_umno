<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\GalleryItem;
use App\Models\Leader;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProgramSeeder::class,
            CampaignEventContentSeeder::class,
        ]);

        User::updateOrCreate(
            ['email' => 'admin@gmail.org.my'],
            [
                'name' => 'Admin Tak Banyak Alasan',
                'password' => Hash::make('admin123'),
            ],
        );

        $categories = collect([
            ['name' => 'Ceramah', 'color' => '#1A3C9E'],
            ['name' => 'Gotong Royong', 'color' => '#2E7D32'],
            ['name' => 'Kesihatan', 'color' => '#C2185B'],
            ['name' => 'Sukan', 'color' => '#E65100'],
            ['name' => 'Kemasyarakatan', 'color' => '#6A1B9A'],
        ])->mapWithKeys(function (array $category) {
            $model = EventCategory::updateOrCreate(
                ['slug' => Str::slug($category['name'])],
                $category + ['slug' => Str::slug($category['name'])],
            );

            return [$category['name'] => $model];
        });

        $events = [
            ['CERAMAH ULANG TAHUN TAK BANYAK ALASAN KE-80', 'Ceramah', 'ongoing', 'event-1.jpg'],
            ['GOTONG ROYONG PERDANA PRESINT 9', 'Gotong Royong', 'upcoming', 'event-2.jpg'],
            ['PROGRAM SARINGAN KESIHATAN KOMUNITI', 'Kesihatan', 'upcoming', 'event-3.jpg'],
            ['SUKAN RAKYAT PUTRAJAYA', 'Sukan', 'past', 'event-4.jpg'],
            ['BANTUAN MAKANAN ASAS KOMUNITI', 'Kemasyarakatan', 'past', 'event-5.jpg'],
            ['DIALOG ASPIRASI WARGA PUTRAJAYA', 'Ceramah', 'past', 'event-6.jpg'],
        ];

        foreach ($events as $index => [$title, $category, $status, $image]) {
            Event::updateOrCreate(
                ['slug' => Str::slug($title)],
                [
                    'event_category_id' => $categories[$category]->id,
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'starts_at' => now()->addDays(($index + 1) * 7)->setTime(20, 0),
                    'venue_name' => 'Dewan Wawasan, Presint 9, Putrajaya',
                    'address' => 'Presint 9, 62250 Putrajaya, Malaysia',
                    'description' => 'Program komuniti Campaign Tak Banyak Alasan untuk menggerakkan warga Putrajaya melalui aktiviti, bantuan, dan ruang aspirasi bersama.',
                    'banner_image' => "assets/{$image}",
                    'status' => $status,
                ],
            );
        }

        foreach ([
            ['Datuk Seri Tengku Adnan Tengku Mansor', 'Pengerusi Gerakan Komuniti', 'adnan-profile.jpg'],
            ['Hafiz Putrajaya', 'Penyelaras Program', 'hafiz-profile.jpg'],
            ['Ketua Komuniti Presint 9', 'Pimpinan Akar Umbi', 'leader-1.jpg'],
            ['Penyelaras Sukarelawan', 'Operasi Lapangan', 'leader-2.jpg'],
        ] as $index => [$name, $position, $photo]) {
            Leader::updateOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'full_name' => $name,
                    'slug' => Str::slug($name),
                    'position' => $position,
                    'photo_path' => "assets/{$photo}",
                    'bio' => 'Fokus kepada pembangunan komuniti, khidmat rakyat, dan gerakan akar umbi yang dekat dengan keperluan warga WP Putrajaya.',
                    'sort_order' => $index + 1,
                    'is_published' => true,
                ],
            );
        }

        foreach ([
            ['Tak Banyak Alasan Melancarkan Program Bantuan Katil Hospital Untuk Asnaf Putrajaya', 'Komuniti', 'article-main.jpg'],
            ['Gerakan Sukarelawan Memperkuat Khidmat Warga Presint', 'Aktiviti', 'article-2.jpg'],
        ] as [$title, $category, $image]) {
            Article::updateOrCreate(
                ['slug' => Str::slug($title)],
                [
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'author' => 'Admin Tak Banyak Alasan',
                    'thumbnail_path' => "assets/{$image}",
                    'category' => $category,
                    'content' => '<p>Artikel ini memaparkan perkembangan program komuniti, bantuan, dan aktiviti warga Putrajaya.</p>',
                    'status' => 'published',
                    'published_at' => now(),
                ],
            );
        }

        foreach ([
            ['Aktiviti komuniti Putrajaya', 'photo', 'community-umno.jpg'],
            ['Ceramah komuniti', 'photo', 'event-1.jpg'],
            ['Program bantuan', 'photo', 'adnan-sumbangan-2025.jpeg'],
            ['Gerak kerja sukarelawan', 'photo', 'hafiz-warroom.jpg'],
        ] as $index => [$title, $type, $image]) {
            GalleryItem::updateOrCreate(
                ['title' => $title],
                [
                    'title' => $title,
                    'type' => $type,
                    'image_path' => "assets/{$image}",
                    'sort_order' => $index + 1,
                    'is_published' => true,
                ],
            );
        }

        SiteSetting::updateOrCreate(
            ['key' => 'brand'],
            [
                'value' => [
                    'name' => 'Tak Banyak Alasan',
                    'language' => 'ms',
                    'turnstile_mode' => 'placeholder_until_client_keys',
                ],
            ],
        );
    }
}

