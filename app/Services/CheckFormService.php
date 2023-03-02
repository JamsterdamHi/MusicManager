<?php

namespace App\Services;

class CheckFormService
{
    public static function checkGenre($data){

        if($data->genre_id === 1){ $genre = 'ポップス';}
        if($data->genre_id === 2){ $genre = 'ロック';}
        if($data->genre_id === 3){ $genre = 'ヒップホップ';}
        if($data->genre_id === 4){ $genre = 'R＆B/ソウル';}
        if($data->genre_id === 5){ $genre = 'レゲエ';}
        if($data->genre_id === 6){ $genre = 'ダンス';}
        if($data->genre_id === 7){ $genre = 'テクノ';}
        if($data->genre_id === 8){ $genre = 'アンビエント';}
        if($data->genre_id === 9){ $genre = 'フォーク';}
        if($data->genre_id === 10){ $genre = 'ブルース';}
        if($data->genre_id === 11){ $genre = 'ジャズ';}
        if($data->genre_id === 12){ $genre = 'カントリー';}
        if($data->genre_id === 13){ $genre = 'ラテン';}
        if($data->genre_id === 14){ $genre = 'ワールド';}
        if($data->genre_id === 15){ $genre = 'ボカロ';}
        if($data->genre_id === 16){ $genre = 'クラシック';}
        if($data->genre_id === 17){ $genre = '子供';}
        if($data->genre_id === 18){ $genre = '演歌';}
        if($data->genre_id === 19){ $genre = '合唱';}
        if($data->genre_id === 20){ $genre = 'インスト';}
        if($data->genre_id === 21){ $genre = 'オルゴール';}
        if($data->genre_id === 22){ $genre = '効果音';}

        return $genre;

    }

    public static function checkMood($data){

        if($data->mood_id === 1){ $mood = '明るい';}
        if($data->mood_id === 2){ $mood = '幸せ';}
        if($data->mood_id === 3){ $mood = 'ドラマティック';}
        if($data->mood_id === 4){ $mood = '神聖';}
        if($data->mood_id === 5){ $mood = 'パワフル';}
        if($data->mood_id === 6){ $mood = '面白い';}
        if($data->mood_id === 7){ $mood = '愛';}
        if($data->mood_id === 8){ $mood = '友情';}
        if($data->mood_id === 9){ $mood = '家族';}
        if($data->mood_id === 10){ $mood = '静かな';}
        if($data->mood_id === 11){ $mood = '都会的';}
        if($data->mood_id === 12){ $mood = 'セクシー';}
        if($data->mood_id === 13){ $mood = '和風';}
        if($data->mood_id === 14){ $mood = '切ない';}
        if($data->mood_id === 15){ $mood = 'ミステリアス';}
        if($data->mood_id === 16){ $mood = 'バラード';}
        if($data->mood_id === 17){ $mood = 'かわいい';}
        if($data->mood_id === 18){ $mood = 'ゲーム';}

        return $mood;

    }
}