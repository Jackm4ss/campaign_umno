<?php

namespace Database\Seeders;

use App\Models\GalleryItem;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
    }
}
