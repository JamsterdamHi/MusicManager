<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Playlist;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * ホーム画面の表示（プレイリスト一覧）
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $playlists = Playlist::orderBy('created_at')->paginate(10);
        return view('home', compact('playlists'));
    }

}
