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
                <p class="h4 text-center">新しい曲の登録</p>
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
                                <option value="1" {{ old('mood_id')==1 ? 'selected' : '' }}>アップテンポ</option>
                                <option value="2" {{ old('mood_id')==2 ? 'selected' : '' }}>ミディアムテンポ</option>
                                <option value="3" {{ old('mood_id')==3 ? 'selected' : '' }}>バラード</option>
                                <option value="4" {{ old('mood_id')==4 ? 'selected' : '' }}>和風</option>
                                <option value="5" {{ old('mood_id')==5 ? 'selected' : '' }}>神聖な</option>
                                <option value="6" {{ old('mood_id')==6 ? 'selected' : '' }}>ダンスビート</option>
                                <option value="7" {{ old('mood_id')==7 ? 'selected' : '' }}>激しい</option>
                                <option value="8" {{ old('mood_id')==8 ? 'selected' : '' }}>ドラマティック</option>
                                <option value="9" {{ old('mood_id')==9 ? 'selected' : '' }}>ゲーム余興</option>
                                <option value="10" {{ old('mood_id')==10 ? 'selected' : '' }}>効果音</option>
                            </select>
                        </div>

                        <div class="col">
                            <label for="custom-select-1">ジャンル</label>
                            <select id="genre" name="genre_id" class="custom-select">
                                <option value="1" {{ old('genre_id')==1 ? 'selected' : '' }}>ポップス</option>
                                <option value="2" {{ old('genre_id')==2 ? 'selected' : '' }}>ロック</option>
                                <option value="3" {{ old('genre_id')==3 ? 'selected' : '' }}>ダンス</option>
                                <option value="4" {{ old('genre_id')==4 ? 'selected' : '' }}>ヒップホップ</option>
                                <option value="5" {{ old('genre_id')==5 ? 'selected' : '' }}>R＆B</option>
                                <option value="6" {{ old('genre_id')==6 ? 'selected' : '' }}>レゲエ</option>
                                <option value="7" {{ old('genre_id')==7 ? 'selected' : '' }}>ジャズ</option>
                                <option value="8" {{ old('genre_id')==8 ? 'selected' : '' }}>クラシック</option>
                                <option value="9" {{ old('genre_id')==9 ? 'selected' : '' }}>インスト</option>
                                <option value="10" {{ old('genre_id')==10 ? 'selected' : '' }}>オルゴール</option>
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