<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Song;
use App\Models\PlaylistSong;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\BinaryOp\Plus;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * プレイリストの追加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ①プレイリスト名をバリデーションする
        // バリデーションルールは必須かつユニーク（重複がない）
        $validatedData = $request->validate([
            'name' => ['required', 'unique:playlists', 'max:50'],
        ], [
            'name.required' => 'プレイリスト名は必須です',
            'name.unique' => 'すでに登録されているプレイリスト名です',
            'name.max' => 'プレイリスト名が長過ぎです'
        ]);
        // ②バリデーションが通ればplaylistテーブルに登録        
        Playlist::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id,
        ]);

        return redirect('home');
    }

    /**
     * 各プレイリストの詳細表示
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 選択したプレイリストを表示する
        $playlist = Playlist::find($id);
        // そのプレイリストに紐づいた曲を表示する
        $songs = Playlist::find($id)->songs()->orderBy('seq')->get();

        return view('playlist', compact('playlist', 'songs'));
    }

    /**
     * ドラッグ＆ドロップで並び替えたajax通信のデータを保存
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function replace(Request $request, $id)
    {
        $playlist = Playlist::find($id);
        foreach ($request->playlist_song_ids as $i => $playlist_song_id) {
            $playlistSong = PlaylistSong::find($playlist_song_id);
            // seqを i+1 の順番で上書き
            $playlistSong->seq = $i + 1;
            $playlistSong->save();
        }
        // ajax通信はredirectは不要。代わりにとりあえずの処理。
        echo json_encode([$request->seqs, $request->song_ids]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * プレイリスト名変更
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $playlist = Playlist::find($id);
        $playlist->name = $request->name;
        $playlist->save();

        return redirect()->route('playlist.show', [$id]);
    }

    /**
     * プレイリストの削除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $playlist = Playlist::find($id);
        $playlist->delete();

        return redirect('home');
    }

    /**
     * 中間テーブルへの「コメント」保存
     */
    public function write(Request $request, $id, $song_id)
    {
        $playlistSong = PlaylistSong::find($request->playlist_song_id);
        $playlistSong->note = $request->note;
        $playlistSong->update();

        return redirect()->route('playlist.show', [$id]);
    }
}
