@extends('adminlte::page')

@section('title', 'SongADD')

@section('content_header')
<link rel="stylesheet" href="{{ asset('/css/style.css') }}" class="href">
<p class="h1"><small class="text-muted">Song</small>ADD</p>

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
                <p class="h4 text-center">新しい曲を追加</p>
                <div class="text-right">
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('songs.index') }}">戻る</a>
                </div>

                <!-- 曲の登録フォーム -->
                <form method="POST" action="{{ route('songs.store') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <label for="custom-select-1">ムード</label>
                            <select id="mood" name="mood_id" class="custom-select">
                                <option value="1" {{ old('mood_id')==1 ? 'selected' : '' }}>明るい</option>
                                <option value="2" {{ old('mood_id')==2 ? 'selected' : '' }}>幸せ</option>
                                <option value="3" {{ old('mood_id')==3 ? 'selected' : '' }}>ドラマティック</option>
                                <option value="4" {{ old('mood_id')==4 ? 'selected' : '' }}>神聖</option>
                                <option value="5" {{ old('mood_id')==5 ? 'selected' : '' }}>パワフル</option>
                                <option value="6" {{ old('mood_id')==6 ? 'selected' : '' }}>楽しい</option>
                                <option value="7" {{ old('mood_id')==7 ? 'selected' : '' }}>愛</option>
                                <option value="8" {{ old('mood_id')==8 ? 'selected' : '' }}>アップテンポ</option>
                                <option value="9" {{ old('mood_id')==9 ? 'selected' : '' }}>ミドルテンポ</option>
                                <option value="10" {{ old('mood_id')==10 ? 'selected' : '' }}>静かな</option>
                                <option value="11" {{ old('mood_id')==11 ? 'selected' : '' }}>都会的</option>
                                <option value="12" {{ old('mood_id')==12 ? 'selected' : '' }}>セクシー</option>
                                <option value="13" {{ old('mood_id')==13 ? 'selected' : '' }}>和風</option>
                                <option value="14" {{ old('mood_id')==14 ? 'selected' : '' }}>切ない</option>
                                <option value="15" {{ old('mood_id')==15 ? 'selected' : '' }}>ミステリアス</option>
                                <option value="16" {{ old('mood_id')==16 ? 'selected' : '' }}>バラード</option>
                                <option value="17" {{ old('mood_id')==17 ? 'selected' : '' }}>かわいい</option>
                                <option value="18" {{ old('mood_id')==18 ? 'selected' : '' }}>ゲーム</option>
                            </select>
                        </div>

                        <div class="col">
                            <label for="custom-select-1">ジャンル</label>
                            <select id="genre" name="genre_id" class="custom-select">
                                <option value="1" {{ old('genre_id')==1 ? 'selected' : '' }}>ポップス</option>
                                <option value="2" {{ old('genre_id')==2 ? 'selected' : '' }}>ロック</option>
                                <option value="3" {{ old('genre_id')==3 ? 'selected' : '' }}>ヒップホップ</option>
                                <option value="4" {{ old('genre_id')==4 ? 'selected' : '' }}>R＆B/ソウル</option>
                                <option value="5" {{ old('genre_id')==5 ? 'selected' : '' }}>レゲエ</option>
                                <option value="6" {{ old('genre_id')==6 ? 'selected' : '' }}>ダンス</option>
                                <option value="7" {{ old('genre_id')==7 ? 'selected' : '' }}>テクノ</option>
                                <option value="8" {{ old('genre_id')==8 ? 'selected' : '' }}>アンビエント</option>
                                <option value="9" {{ old('genre_id')==9 ? 'selected' : '' }}>フォーク</option>
                                <option value="10" {{ old('genre_id')==10 ? 'selected' : '' }}>ブルース</option>
                                <option value="11" {{ old('genre_id')==11 ? 'selected' : '' }}>ジャズ</option>
                                <option value="12" {{ old('genre_id')==12 ? 'selected' : '' }}>カントリー</option>
                                <option value="13" {{ old('genre_id')==13 ? 'selected' : '' }}>ラテン</option>
                                <option value="14" {{ old('genre_id')==14 ? 'selected' : '' }}>ワールド</option>
                                <option value="15" {{ old('genre_id')==15 ? 'selected' : '' }}>ボカロ</option>
                                <option value="16" {{ old('genre_id')==16 ? 'selected' : '' }}>クラシック</option>
                                <option value="17" {{ old('genre_id')==17 ? 'selected' : '' }}>子供</option>
                                <option value="18" {{ old('genre_id')==18 ? 'selected' : '' }}>演歌</option>
                                <option value="19" {{ old('genre_id')==19 ? 'selected' : '' }}>合唱</option>
                                <option value="20" {{ old('genre_id')==20 ? 'selected' : '' }}>インスト</option>
                                <option value="21" {{ old('genre_id')==21 ? 'selected' : '' }}>オルゴール</option>
                                <option value="22" {{ old('genre_id')==22 ? 'selected' : '' }}>効果音</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">曲名</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            placeholder="曲のタイトルを入力">
                    </div>

                    <div class="form-group">
                        <label for="artist">アーティスト名</label>
                        <input type="text" class="form-control" id="artist_name" name="artist_name"
                            value="{{ old('artist_name') }}" placeholder="アーティスト名を入力">
                    </div>

                    <div class="form-group">
                        <label for="demo">試聴用URL</label>
                        <input type="text" class="form-control" id="youtube_url" name="youtube_url"
                            value="{{ old('youtube_url') }}" placeholder="URL">
                    </div>
            </div>
            <!-- card-footer -->
            <div class="card-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-primary w-25">登録</button>
            </div>
            </form>

        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop