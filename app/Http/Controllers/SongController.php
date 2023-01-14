<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Song;
use App\Services\CheckFormService;
use App\Http\Requests\StoreSongRequest;

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
    public function store(StoreSongRequest $request)
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

        return redirect('/songs');
    }

    /**
     * 曲編集画面の表示
     */
    public function edit($id)
    {
        $song = Song::find($id);

        $genre = CheckFormService::checkGenre($song);

        $mood = CheckFormService::checkMood($song);

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

        return redirect('/songs');
    }

        /**
     * 曲の削除
     */
    public function destroy($id)
    {
        $song = Song::find($id);
        $song->delete();

        return redirect('/songs');
    }

        /**
     * プレイリストへ曲の登録
     */
    public function add_songs(Request $request)
    {
        // dd($request);

        return redirect('/playlist');
    }
}