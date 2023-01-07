<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Song;

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
            'artist' => $request->artist_id,
            'genre' => $request->genre_id,
            'mood' => $request->mood_id,
            'user_id' => Auth::user()->id,
        ]);

        return redirect('songs.index');

    }
}