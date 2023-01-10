@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>新しい曲の登録</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <form method="POST" action="{{ route('songs.store') }}">
                    @csrf
                    <div class="card-body">

                        <div class="row mb-3">
                            <div class="col">
                                <label for="custom-select-1">ムード</label>
                                <select id="mood" name="mood_id" class="custom-select">
                                    <option value="1">アップテンポ</option>
                                    <option value="2">ミディアムテンポ</option>
                                    <option value="3">バラード</option>
                                    <option value="4">和風</option>
                                    <option value="5">神聖な</option>
                                    <option value="6">ダンスビート</option>
                                    <option value="7">激しい</option>
                                    <option value="8">ドラマティック</option>
                                    <option value="9">ゲーム余興</option>
                                    <option value="10">効果音</option>
                                </select>
                            </div>

                            <div class="col">
                                <label for="custom-select-1">ジャンル</label>
                                <select id="genre" name="genre_id" class="custom-select">
                                    <option value="1">ポップス</option>
                                    <option value="2">ロック</option>
                                    <option value="3">ダンス</option>
                                    <option value="4">ヒップホップ</option>
                                    <option value="5">R＆B</option>
                                    <option value="6">レゲエ</option>
                                    <option value="7">ジャズ</option>
                                    <option value="8">クラシック</option>
                                    <option value="9">インスト</option>
                                    <option value="10">オルゴール</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">曲名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="曲のタイトルを入力">
                        </div>

                        <div class="form-group">
                            <label for="artist">アーティスト名</label>
                            <input type="text" class="form-control" id="artist_name" name="artist_name" placeholder="アーティスト名を入力">
                        </div>

                        <div class="form-group">
                            <label for="demo">試聴</label>
                            <input type="text" class="form-control" id="youtube_url" name="youtube_url" placeholder="URL">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
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
