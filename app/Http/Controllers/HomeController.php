<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Playlist;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        if(Gate::allows('isAdmin'))
        {
            // 管理者は全てのプレイリストを表示
            $user = User::all();
            $playlists = Playlist::orderBy('created_at')->paginate(10);
        }else{
            // 認証済みユーザーid取得
            $id = Auth::id();
            $user = DB::table('users')->find($id);
            // プレイリスト一覧表示
            $playlists = Playlist::where('user_id', $id)->orderBy('created_at')->paginate(10);
        }

        return view('home', compact('playlists'));
    }
}
