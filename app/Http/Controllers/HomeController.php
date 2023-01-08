<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Myプレイリスト表示
     */
    public function show()
    {
        // 商品一覧取得
        $playlist = Song::find('choice');
        return view('playlist', compact('songs'));
    }
}
