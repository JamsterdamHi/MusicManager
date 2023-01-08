<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Song;

class Genre extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function songs()
    {
        return $this->hasMany(Song::class);
    }
    
    // public function create()
    // {
    //     Genre::upsert([
    //         ['id' => 1, 'name'=> 'ポップス'],
    //         ['id' => 2, 'name'=> 'ロック'],
    //         ['id' => 3, 'name'=> 'ダンス'],
    //         ['id' => 4, 'name'=> 'ヒップホップ'],
    //         ['id' => 5, 'name'=> 'R＆B'],
    //         ['id' => 6, 'name'=> 'レゲエ'],
    //         ['id' => 7, 'name'=> 'ジャズ'],
    //         ['id' => 8, 'name'=> 'クラシック'],
    //         ['id' => 9, 'name'=> 'インスト'],
    //         ['id' => 10, 'name'=> 'オルゴール'],
    //     ],['id'],['name']);
    // }
}
