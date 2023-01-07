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
                                <select id="mood" name="mood" class="custom-select">
                                    <option>アップテンポ</option>
                                    <option>ミディアムテンポ</option>
                                    <option>バラード</option>
                                    <option>おごそか</option>
                                    <option>和風</option>
                                </select>
                            </div>

                            <div class="col">
                                <label for="custom-select-1">ジャンル</label>
                                <select id="genre" name="genre" class="custom-select">
                                    <option>ポップス</option>
                                    <option>ロック</option>
                                    <option>ヒップホップ</option>
                                    <option>ジャズ</option>
                                    <option>クラシック</option>
                                    <option>インスト</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">曲名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="曲のタイトルを入力">
                        </div>

                        <div class="form-group">
                            <label for="artist">アーティスト名</label>
                            <input type="text" class="form-control" id="artist" name="artist" placeholder="アーティスト名を入力">
                        </div>

                        <div class="form-group">
                            <label for="demo">試聴</label>
                            <img class="logo-youtube" src="../vendor/adminlte/dist/img/youtube_icon-icons.com_62716.png" style="width: 30px; margin-left: 10px; margin-bottom: 5px;">
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
