<?php

namespace Database\Seeders;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Database\Seeder;

class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $songs = Song::all();

        Playlist::factory(10)->create()
        ->each(function(Playlist $playlist) use ($songs){
              //1~6までの数値をランダムで取得
            $ran = rand(1, 6);

             // 中間テーブルに紐付け
            $playlist->songs()->attach(
                $songs->random($ran)->pluck('id')->toArray(),
            ['note'=>'PlayList']);
        });        
    }
}
