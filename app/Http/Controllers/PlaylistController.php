<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\BinaryOp\Plus;
use Illuminate\Support\Facades\DB;

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
     * Store a newly created resource in storage.
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
        ],[
            'name.required'=>'プレイリスト名は必須です',
            'name.unique'=>'すでに登録されているプレイリスト名です',
            'name.max'=>'プレイリスト名が長過ぎです'
        ]);

        // ②バリデーションが通ればplaylistテーブルに登録        
        Playlist::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id,
        ]);
                
        return redirect('home');
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);

        $playlist = Playlist::find($id);

        return view('playlist', compact('playlist'));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
