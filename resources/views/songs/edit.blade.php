@extends('adminlte::page')

@section('title', 'SongEDIT')

@section('content_header')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" class="href">
    <p class="h1"><small class="text-muted">Song</small>EDIT</p>
@stop

@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">

            <!-- バリデーション アラート -->
            @if ($errors->any())
                <div class="alert text-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary bg-light my-5">
                <div class="card-body">
                    <p class="h4 text-center">曲の編集</p>
                    <div class="text-right">
                        <a class="btn btn-outline-secondary btn-sm" href="{{ route('songs.index') }}">戻る</a>
                    </div>

                    <!-- 曲の編集フォーム -->
                    <form method="POST" action="{{ route('songs.update', ['id' => $song->id]) }}">
                    @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label for="custom-select-1">ムード</label>
                                <select id="mood" name="mood_id" class="custom-select" value="{{ $mood }}">
                                    <option value="1" @if($song->mood_id == 1) selected @endif>明るい</option>
                                    <option value="2" @if($song->mood_id == 2) selected @endif>幸せ</option>
                                    <option value="3" @if($song->mood_id == 3) selected @endif>ドラマティック</option>
                                    <option value="4" @if($song->mood_id == 4) selected @endif>神聖</option>
                                    <option value="5" @if($song->mood_id == 5) selected @endif>パワフル</option>
                                    <option value="6" @if($song->mood_id == 6) selected @endif>面白い</option>
                                    <option value="7" @if($song->mood_id == 7) selected @endif>愛</option>
                                    <option value="8" @if($song->mood_id == 8) selected @endif>友情</option>
                                    <option value="9" @if($song->mood_id == 9) selected @endif>家族</option>
                                    <option value="10" @if($song->mood_id == 10) selected @endif>静かな</option>
                                    <option value="11" @if($song->mood_id == 11) selected @endif>都会的</option>
                                    <option value="12" @if($song->mood_id == 12) selected @endif>セクシー</option>
                                    <option value="13" @if($song->mood_id == 13) selected @endif>和風</option>
                                    <option value="14" @if($song->mood_id == 14) selected @endif>切ない</option>
                                    <option value="15" @if($song->mood_id == 15) selected @endif>ミステリアス</option>
                                    <option value="16" @if($song->mood_id == 16) selected @endif>バラード</option>
                                    <option value="17" @if($song->mood_id == 17) selected @endif>かわいい</option>
                                    <option value="18" @if($song->mood_id == 18) selected @endif>ゲーム</option>
                                </select>
                            </div>

                            <div class="col">
                                <label for="custom-select-1">ジャンル</label>
                                <select id="genre" name="genre_id" class="custom-select">
                                    <option value="1" @if($song->genre_id == 1) selected @endif>ポップス</option>
                                    <option value="2" @if($song->genre_id == 2) selected @endif>ロック</option>
                                    <option value="3" @if($song->genre_id == 3) selected @endif>ヒップホップ</option>
                                    <option value="4" @if($song->genre_id == 4) selected @endif>R＆B/ソウル</option>
                                    <option value="5" @if($song->genre_id == 5) selected @endif>レゲエ</option>
                                    <option value="6" @if($song->genre_id == 6) selected @endif>ダンス</option>
                                    <option value="7" @if($song->genre_id == 7) selected @endif>テクノ</option>
                                    <option value="8" @if($song->genre_id == 8) selected @endif>アンビエント</option>
                                    <option value="9" @if($song->genre_id == 9) selected @endif>フォーク</option>
                                    <option value="10" @if($song->genre_id == 10) selected @endif>ブルース</option>
                                    <option value="11" @if($song->genre_id == 11) selected @endif>ジャズ</option>
                                    <option value="12" @if($song->genre_id == 12) selected @endif>カントリー</option>
                                    <option value="13" @if($song->genre_id == 13) selected @endif>ラテン</option>
                                    <option value="14" @if($song->genre_id == 14) selected @endif>ワールド</option>
                                    <option value="15" @if($song->genre_id == 15) selected @endif>ボカロ</option>
                                    <option value="16" @if($song->genre_id == 16) selected @endif>クラシック</option>
                                    <option value="17" @if($song->genre_id == 17) selected @endif>子供</option>
                                    <option value="18" @if($song->genre_id == 18) selected @endif>演歌</option>
                                    <option value="19" @if($song->genre_id == 19) selected @endif>合唱</option>
                                    <option value="20" @if($song->genre_id == 20) selected @endif>インスト</option>
                                    <option value="21" @if($song->genre_id == 21) selected @endif>オルゴール</option>
                                    <option value="22" @if($song->genre_id == 22) selected @endif>効果音</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">曲名</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $song->name }}">
                        </div>

                        <div class="form-group">
                            <label for="artist">アーティスト名</label>
                            <input type="text" class="form-control" id="artist_name" name="artist_name" value="{{ $song->artist_name }}">
                        </div>

                        <div class="form-group">
                            <label for="demo">試聴</label>
                            <input type="text" class="form-control" id="youtube_url" name="youtube_url" value="{{ $song->youtube_url }}">
                        </div>
                </div>

                    <!-- card-footer -->
                    <div class="card-footer row m-0">
                        <!-- 曲の更新 -->
                        <button type="submit" class="btn btn-primary w-25">更新</button>
                </form>
                        <!-- 曲の削除フォーム -->
                        <form id="delete_{{ $song->id }}" action="{{ route('songs.destroy', ['id' => $song->id]) }}" method="POST" class="col-9 text-right">
                        @csrf
                                <a href="#" data-id="{{ $song->id }}" onclick="deletePost(this)"  class="btn btn-outline-danger rounded-circle">ー</a>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
<!-- 確認メッセージ -->
    <script>
        function deletePost(e){
            'use strict'
            if (confirm('本当に削除しますか？')) {
                document.getElementById('delete_' + e.dataset.id).submit()
            }
        }
    </script>
@stop
