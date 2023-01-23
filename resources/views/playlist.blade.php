@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" class="href">
    <p class="h1"><small class="text-muted">My</small>PLAYLIST</p>
    <h1>{{ $playlist->name }}</h1>
@stop

@section('content')
<div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex flex-row">
                        <div class="card-tools">
                            <div class="float-right">
                                <a class="btn btn-secondary btn-sm" href="{{ route('home') }}">戻る</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>コメント</th>
                                    <th>ムード</th>
                                    <th>ジャンル</th>                    
                                    <th>曲名</th>
                                    <th>アーティスト名</th>
                                    <th>試聴</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($songs as $song)
                                    <tr>
                                        <td>
                                            <form action="#">
                                                <div class="col-sm-10">
                                                    <input type="text" readonly class="form-control-plaintext convertInput" id="comment" name="comment" value="コメント追加" maxlength="50">
                                                </div>
                                            </form>
                                        </td>
                                        <td>{{ $song->mood->name }}</td>
                                        <td>{{ $song->genre->name }}</td>
                                        <td>{{ $song->name }}</td>
                                        <td>{{ $song->artist_name }}</td>
                                        <td><a href="{{ $song->youtube_url }}">{{ $song->youtube_url }}</a></td>
                                        <td>
                                            <form id="delete_{{ $playlist->id }}" action="{{ route('playlist.destroy', ['id' => $playlist->id]) }}" method="POST">
                                                    @csrf
                                                        <a href="#" data-id="{{ $playlist->id }}" onclick="deletePost(this)" class="btn btn-outline-danger btn-sm">削除</a>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>


                        </table>
                    </div>
                </
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
