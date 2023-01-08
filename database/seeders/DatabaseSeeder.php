<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\GenreSeeder;
use Database\Seeders\MoodSeeder;
use Database\Seeders\SongSeeder;
use Database\Seeders\PlaylistSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        $this->call(GenreSeeder::class);
        $this->call(MoodSeeder::class);
        $this->call(SongSeeder::class);
        $this->call(PlaylistSeeder::class);
    }
}
