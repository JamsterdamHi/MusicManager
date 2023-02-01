@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <form method="POST" action="{{ route('playlist.update', ['id' => $playlist->id]) }}" onsubmit="return true;">
        @csrf
        <input type="text" name="name" id="name" class="h2 border-0 w-75 bg-transparent" value="{{ $playlist->name }}"> 
    </form>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex flex-row">
                    <div class="card-tools">
                        <div class="text-right">
                            <a class="btn btn-secondary btn-sm" href="{{ route('home') }}">戻る</a>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap table-sm">
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

                        <tbody id="sort">
                            @foreach ($songs as $i => $song)
                                <tr id="{{ $i+1 }}">
                                    <input type="hidden" class="seq" value="{{ $i+1 }}" name="seq{{ $i+1 }}">
                                    <td>
                                        <form method="POST" action="{{ route('playlist.write', ['id' => $playlist->id]) }}" onsubmit="return true;">
                                            @csrf
                                            <input type="hidden" name="song_id" value="{{ $song->id }}">
                                            <input class="appearance-none border rounded px-3 text-gray-700 input-sm" type="text" name="note" class="form-control" id="note" value="{{ $song->pivot->note }}" placeholder="コメント入力"> 
                                        </form>
                                    </td>
                                    <td>{{ $song->mood->name }}</td>
                                    <td>{{ $song->genre->name }}</td>
                                    <td>{{ $song->name }}</td>
                                    <td>{{ $song->artist_name }}</td>
                                    <td><a href="{{ $song->youtube_url }}">{{ $song->youtube_url }}</a></td>

                                    <td>
                                        <form method="POST" action="{{ route('songs.remove_song' ) }}">
                                                @csrf
                                                <input type="hidden" name="song_id" value="{{ $song->id }}">
                                                <input type="hidden" name="playlist_id" value="{{ $playlist->id }}">
                                                <button type="submit" onclick="deletePost(this)" class="btn btn-outline-danger btn-sm">削除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
            {{ $songs->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" class="href">
@stop

@section('js')
    <script src="{{ asset('/js/playlist.js') }}"></script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- jQuery UI -->
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>

    <!-- ドラッグ＆ドロップ -->
    <script>
        $(function () {
            $("#sort").sortable({
                update: function () {
                    $("#log").text($('#sort').sortable("toArray"));
                    var i = 1;
                    $(".seq").each(function () {
                        var seq = $(this).val(i);
                        i++;
                    });
                }
            });
        });
    </script>

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
