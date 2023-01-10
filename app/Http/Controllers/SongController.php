<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Song;
use App\Models\Genre;
use App\Models\Mood;

class SongController extends Controller
{

    /**
     * 曲一覧
     */
    public function index()
    {
        // 商品一覧取得
        $songs = Song::all();
        return view('songs.index', compact('songs'));
    }

    /**
     * 曲登録画面の表示
     */
    public function create(Request $request)
    {
        return view('songs.create');
    }

    /**
     * 曲登録
     */
    public function store(Request $request)
    {
        // dd($request);

        Song::create([
            'name' => $request->name,
            'youtube_url' => $request->youtube_url,
            'artist_name' => $request->artist_name,
            'genre_id' => $request->genre_id,
            'mood_id' => $request->mood_id,
            'user_id' => Auth::user()->id,
        ]);

        return redirect('songs');
    }

    /**
     * 曲編集画面の表示
     */
    public function edit($id)
    {
        $song = Song::find($id);

        if($song->genre_id === 1){ $genre = 'ポップス';}
        if($song->genre_id === 2){ $genre = 'ロック';}
        if($song->genre_id === 3){ $genre = 'ダンス';}
        if($song->genre_id === 4){ $genre = 'ヒップホップ';}
        if($song->genre_id === 5){ $genre = 'R＆B';}
        if($song->genre_id === 6){ $genre = 'レゲエ';}
        if($song->genre_id === 7){ $genre = 'ジャズ';}
        if($song->genre_id === 8){ $genre = 'クラシック';}
        if($song->genre_id === 9){ $genre = 'インスト';}
        if($song->genre_id === 10){ $genre = 'オルゴール';}

        if($song->mood_id === 1){ $mood = 'アップテンポ';}
        if($song->mood_id === 2){ $mood = 'ミディアム';}
        if($song->mood_id === 3){ $mood = 'バラード';}
        if($song->mood_id === 4){ $mood = '和風';}
        if($song->mood_id === 5){ $mood = '神聖な';}
        if($song->mood_id === 6){ $mood = 'ダンスビート';}
        if($song->mood_id === 7){ $mood = '激しい';}
        if($song->mood_id === 8){ $mood = 'ドラマティック';}
        if($song->mood_id === 9){ $mood = 'ゲーム余興';}
        if($song->mood_id === 10){ $mood = '効果音';}

        return view('songs.edit', compact('song', 'genre', 'mood'));
    }

    /**
     * 曲のアップデート
     */
    public function update(Request $request, $id)
    {
        $song = Song::find($id);
        $song->name = $request->name;
        $song->artist_name = $request->artist_name;
        $song->youtube_url = $request->youtube_url;
        $song->genre_id = $request->genre_id;
        $song->mood_id = $request->mood_id;
        $song->save();

        return view('songs.index');
    }
}