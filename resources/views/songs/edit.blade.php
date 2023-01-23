@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" class="href">
    <p class="h1"><small class="text-muted">Song</small>EDIT</p>
@stop

@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary my-5">
                <form method="POST" action="{{ route('songs.update', ['id' => $song->id]) }}">
                    @csrf
                    <div class="card-body">
                        <p class="h4 text-center">曲の編集</p>
                        <div class="text-right">
                            <a class="btn btn-secondary btn-sm" href="{{ route('songs.index') }}">戻る</a>
                        </div>


                        <div class="row mb-3">
                            <div class="col">
                                <label for="custom-select-1">ムード</label>
                                <select id="mood" name="mood_id" class="custom-select" value="{{ $mood }}">
                                    <option value="1" @if($song->mood_id == 1) selected @endif>アップテンポ</option>
                                    <option value="2" @if($song->mood_id == 2) selected @endif>ミディアムテンポ</option>
                                    <option value="3" @if($song->mood_id == 3) selected @endif>バラード</option>
                                    <option value="4" @if($song->mood_id == 4) selected @endif>和風</option>
                                    <option value="5" @if($song->mood_id == 5) selected @endif>神聖な</option>
                                    <option value="6" @if($song->mood_id == 6) selected @endif>ダンスビート</option>
                                    <option value="7" @if($song->mood_id == 7) selected @endif>激しい</option>
                                    <option value="8" @if($song->mood_id == 8) selected @endif>ドラマティック</option>
                                    <option value="9" @if($song->mood_id == 9) selected @endif>ゲーム余興</option>
                                    <option value="10" @if($song->mood_id == 10) selected @endif>効果音</option>
                                </select>
                            </div>

                            <div class="col">
                                <label for="custom-select-1">ジャンル</label>
                                <select id="genre" name="genre_id" class="custom-select">
                                    <option value="1" @if($song->genre_id == 1) selected @endif>ポップス</option>
                                    <option value="2" @if($song->genre_id == 2) selected @endif>ロック</option>
                                    <option value="3" @if($song->genre_id == 3) selected @endif>ダンス</option>
                                    <option value="4" @if($song->genre_id == 4) selected @endif>ヒップホップ</option>
                                    <option value="5" @if($song->genre_id == 5) selected @endif>R＆B</option>
                                    <option value="6" @if($song->genre_id == 6) selected @endif>レゲエ</option>
                                    <option value="7" @if($song->genre_id == 7) selected @endif>ジャズ</option>
                                    <option value="8" @if($song->genre_id == 8) selected @endif>クラシック</option>
                                    <option value="9" @if($song->genre_id == 9) selected @endif>インスト</option>
                                    <option value="10" @if($song->genre_id == 10) selected @endif)>オルゴール</option>
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

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">更新する</button>
                    </div>
                </form>

                <form id="delete_{{ $song->id }}" action="{{ route('songs.destroy', ['id' => $song->id]) }}" method="POST">
                    @csrf
                    <div class="card-footer">
                        <a href="#" data-id="{{ $song->id }}" onclick="deletePost(this)" class="btn btn-danger">削除</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

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

@section('css')
@stop

@section('js')
@stop
