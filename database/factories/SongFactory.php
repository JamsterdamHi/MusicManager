<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Mood;

class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(10),
            'youtube_url'=>$this->faker->url,
            'artist_id'=> Artist::first(),
            'genre_id'=> Genre::first(),
            'mood_id'=> Mood::first(),
        ];
    }
}
