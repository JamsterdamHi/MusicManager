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
     * 曲登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'a_name' => $request->a_name,
                'mood' => $request->mood,
                'genre' => $request->genre,
                'demo' => $request->demo,
            ]);

            return redirect('/songs');
        }

        return view('songs.add');
    }
}
