<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        $this->call(SongSeeder::class);
        $this->call(PlaylistSeeder::class);
    }
}
