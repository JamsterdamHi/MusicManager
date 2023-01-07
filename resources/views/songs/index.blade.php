@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>曲一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">曲一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="text-align:left">
                            <div class="input-group-append">
                                <a href="{{ url('home/playlist') }}" class="btn btn-default">プレイリストへ追加</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('songs/create') }}" class="btn btn-default">曲の編集</a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('songs/add') }}" class="btn btn-default">新しい曲の登録</a>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>  
                                <th></th>
                                <th>ムード</th>
                                <th>ジャンル</th>                    
                                <th>曲名</th>
                                <th>アーティスト名</th>
                                <th>試聴</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($songs as $song)
                                <tr>
                                    <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="choice" value="">
                                        <!-- <label class="form-check-label" for="flexCheckIndeterminate"></label> -->
                                    </div>
                                    </td>
                                    <td>{{ $song->mood->name }}</td>
                                    <td>{{ $song->genre->name }}</td>
                                    <td>{{ $song->name }}</td>
                                    <td>{{ $song->artist->name }}</td>
                                    <td><a href="{{ $song->youtube_url }}"></a>{{ $song->youtube_url }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
