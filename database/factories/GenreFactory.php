<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $genres = ['ポップス','ロック','ダンス','ジャズ','ラテン',' クラシック','行進曲','ワールド','声楽','邦楽'];
        return [
            'name'=>$this->faker->randomElement($genres)
        ];
    }
}
