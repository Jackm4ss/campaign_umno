<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProgramSeeder::class,
        ]);

        User::updateOrCreate(
            ['email' => 'admin@gmail.org.my'],
            [
                'name' => 'Admin Tak Banyak Alasan',
                'password' => Hash::make('admin123'),
            ],
        );
    }
}
