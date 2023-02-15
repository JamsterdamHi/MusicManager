<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Song;

class Mood extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function songs()
    {
        return $this->hasMany(Song::class);
    }

    // public function create()
    // {
    //     Mood::upsert([
    //         ['id' => 1, 'name'=> 'アップテンポ'],
    //         ['id' => 2, 'name'=> 'ミディアムテンポ'],
    //         ['id' => 3, 'name'=> 'バラード'],
    //         ['id' => 4, 'name'=> '和風'],
    //         ['id' => 5, 'name'=> '神聖な'],
    //         ['id' => 6, 'name'=> '悲しい'],
    //         ['id' => 7, 'name'=> '激しい'],
    //         ['id' => 8, 'name'=> 'ドラマティック'],
    //         ['id' => 9, 'name'=> 'ゲーム余興'],
    //         ['id' => 10, 'name'=> '効果音'],
    //     ],['id'],['name']);
    // }


}
