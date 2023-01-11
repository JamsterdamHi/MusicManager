<?php

namespace App\Services;

class CheckFormService
{
    public static function checkGenre($data){

        if($data->genre_id === 1){ $genre = 'ポップス';}
        if($data->genre_id === 2){ $genre = 'ロック';}
        if($data->genre_id === 3){ $genre = 'ダンス';}
        if($data->genre_id === 4){ $genre = 'ヒップホップ';}
        if($data->genre_id === 5){ $genre = 'R＆B';}
        if($data->genre_id === 6){ $genre = 'レゲエ';}
        if($data->genre_id === 7){ $genre = 'ジャズ';}
        if($data->genre_id === 8){ $genre = 'クラシック';}
        if($data->genre_id === 9){ $genre = 'インスト';}
        if($data->genre_id === 10){ $genre = 'オルゴール';}

        return $genre;

    }

    public static function checkMood($data){

        if($data->mood_id === 1){ $mood = 'アップテンポ';}
        if($data->mood_id === 2){ $mood = 'ミディアム';}
        if($data->mood_id === 3){ $mood = 'バラード';}
        if($data->mood_id === 4){ $mood = '和風';}
        if($data->mood_id === 5){ $mood = '神聖な';}
        if($data->mood_id === 6){ $mood = 'ダンスビート';}
        if($data->mood_id === 7){ $mood = '激しい';}
        if($data->mood_id === 8){ $mood = 'ドラマティック';}
        if($data->mood_id === 9){ $mood = 'ゲーム余興';}
        if($data->mood_id === 10){ $mood = '効果音';}

        return $mood;

    }
}