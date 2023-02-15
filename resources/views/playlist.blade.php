@extends('adminlte::page')

@section('title', "$playlist->name")

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
                <div class="card-head bg-secondary">
                    <div class="card-tools">
                        <a class="btn btn-secondary btn-sm" href="{{ route('home') }}">戻る</a>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap table-sm">
                        <thead class="table-secondary">
                            <tr>
                                <th>コメント</th>
                                <th>ムード</th>
                                <th>ジャンル</th>                    
                                <th>曲名</th>
                                <th>アーティスト名</th>
                                <th>試聴</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody id="sort" class="slider">
                            @foreach ($songs as $i => $song)
                                <tr id="{{ $i+1 }}">
                                    <input type="hidden" class="inOrder" data-playlist-id="{{ $playlist->id }}" data-playlist-song-id="{{ $song->pivot->id }}" value="{{ $i+1 }}" name="inOrder{{ $i+1 }}">
                                    <td>
                                        <form method="POST" action="{{ route('playlist.write', ['id' => $playlist->id, 'song_id' => $song->id]) }}" onsubmit="return true;">
                                            @csrf
                                            <input type="hidden" name="playlist_song_id" value="{{ $song->pivot->id }}">
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
                                        <form method="POST" action="{{ route('songs.remove_song', ['id' => $playlist->id, 'song_id' => $song->id]) }}">
                                                @csrf
                                                <input type="hidden" name="playlist_song_id" value="{{ $song->pivot->id }}">
                                                <input type="hidden" name="song_id" value="{{ $song->id }}">
                                                <input type="hidden" name="playlist_id" value="{{ $playlist->id }}">
                                                <button type="submit" onclick="deletePost(this)" class="btn btn-outline-danger btn-sm rounded-circle">ー</button>
                                        </form>
                                    </td>
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
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" class="href">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
@stop

@section('js')
    <!-- Scripts -->
    <script src="{{ mix('js/function.js') }}"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- jQuery UI -->
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
    <!-- jQuery UI Touch Punch -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js" integrity="sha512-0bEtK0USNd96MnO4XhH8jhv3nyRF0eK87pJke6pkYf3cM0uDIhNJy9ltuzqgypoIFXw3JSuiy04tVk4AjpZdZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    @stop
