<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Mood;
use App\Models\Song;
use App\Models\User;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 50; $i++) {
            $genre = Genre::inRandomOrder()->first();
            $mood = Mood::inRandomOrder()->first();
            $user = User::inRandomOrder()->first();
            
            Song::factory()->create([
                'genre_id' => $genre->id,
                'mood_id'=>$mood->id,
                'user_id'=> $user->id
            ]);
        }
    }
}
