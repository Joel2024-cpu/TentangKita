<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Story;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
        public function run(): void
        {
            Story::create([
                'title' => 'Pertama Kali Bertemu',
                'content' => 'Aku tidak sengaja menabrakmu di perpustakaan. Klise, tapi nyata.',
                'story_date' => '2023-01-15',
            ]);

            Story::create([
                'title' => 'Jadian!',
                'content' => 'Akhirnya kita resmi bersama di tempat kopi favorit.',
                'story_date' => '2023-03-20',
            ]);
        }
}
