<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Song;
use App\Models\Playlist;
use App\Models\PlaylistSong;
use App\Services\CheckFormService;
use App\Http\Requests\StoreSongRequest;

class SongController extends Controller
{
    /**
     * 曲一覧
     */
    public function index()
    {
        // 曲一覧取得、ペジネーション対応
        $songs = Song::orderBy('name')->paginate(15);
        // ドロップダウン表示
        $playlists = Playlist::all();

        return view('songs.index', compact('songs', 'playlists'));
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
     * @param Request $request
     * @return void
     */
    public function add_songs(Request $request)
    {
        $playlist = Playlist::find($request->playlist_id);
        if ($request->filled('songs')) {
            $playlist->songs()->attach($request->songs);

            // 現PlaylistSongテーブルのseqの最大値
            $maxSeq = PlaylistSong::where('playlist_id', $request->playlist_id)->max('seq');

            // song_id が同じ場合の条件式

            // PlaylistSongテーブルのseqに順番に数値を付与する処理
            foreach ($request->songs as $song_id) {
                $playlistSong = PlaylistSong::where('playlist_id', $request->playlist_id)->where('song_id', $song_id)->first();
                $playlistSong->seq=$maxSeq+1;
                $playlistSong->update();
                $maxSeq++;
            }

        }else {
            return redirect()->back();
        }

        return redirect()->route('playlist.show',$request->playlist_id);
    }

    /**
     * プレイリストから曲を削除
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function remove_song(Request $request)
    {
        $playlist = Playlist::find($request->playlist_id);
        $playlist->songs()->detach($request->song_id);

        return redirect()->route('playlist.show',$request->playlist_id);
    }
}