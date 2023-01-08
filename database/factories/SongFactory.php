<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
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
            'name' => $this->faker->text(10),
            'artist_name'=> $this->faker->name(),
            'youtube_url'=>$this->faker->url(),
            'genre_id'=> Genre::first(),
            'mood_id'=> Mood::first(),
        ];
    }
}
