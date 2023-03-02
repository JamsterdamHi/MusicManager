@extends('adminlte::page')

@section('title', '曲一覧')

@section('content_header')
<p class="h1"><small class="text-muted">Song</small>LIBRARY</p>
<br>
@stop


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- バリデーションメッセージ -->
            @if ($errors->any())
                <div class="alert text-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-header d-flex justify-content-between bg-secondary">
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <!-- ドロップダウン：プレイリストへ追加 -->
                        <div class="dropdown">
                            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                プレイリストへ追加
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach ($playlists as $playlist)
                                <button form="add_songs" type="submit" class="dropdown-item" name="playlist_id"
                                    value="{{ $playlist->id }}">{{ $playlist->name }}</button>
                                @endforeach
                            </div>
                        </div>
                        <!-- Modalボタン -->
                        <div class="input-group-append ml-1">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                ＋
                            </button>
                        </div>
                        <!-- 検索 -->
                        <div class="ml-5 pl-5">
                            <form method="GET" action="{{ route('songs.index') }}">
                                <input class="bg-light border-0 form-control-sm" type="text" name="search"
                                    placeholder="キーワード" value="@if (isset($search)) {{ $search }} @endif">
                                <button type="submit" class="btn btn-primary btn-sm border-0 bg-secondary">検索</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">プレイリスト作成</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{ route('playlist.store') }}">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">新規プレイリスト名</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="プレイリストのタイトルを入力">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary"
                                    data-dismiss="modal">閉じる</button>
                                <button type="submit" class="btn btn-primary">登録</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-sm">
                    <thead class="table-header table-secondary">
                        <tr>
                            <!-- sortable -->
                            <th></th>
                            <th class="column-sort">@sortablelink('mood_id', 'ムード')</th>
                            <th class="column-sort">@sortablelink('genre_id', 'ジャンル')</th>
                            <th class="column-sort">@sortablelink('name', '曲名')</th>
                            <th class="column-sort">@sortablelink('artist_name', 'アーティスト名')</th>
                            <th>試聴</th>
                            <th></th>
                        </tr>
                    </thead>
                    <!-- 曲一覧表示 -->
                    <tbody class="table table-striped">
                        <!-- チェックボックスで選択した曲をプレイリストへ追加 -->
                        <form id="add_songs" action="{{ route('songs.add_songs') }}" method="POST">
                            @csrf
                            @foreach ($songs as $i => $song)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="songs[]"
                                            value="{{ $song->id }}">
                                    </div>
                                </td>
                                <td>{{ $song->mood->name }}</td>
                                <td>{{ $song->genre->name }}</td>
                                <td>{{ $song->name }}</td>
                                <td>{{ $song->artist_name }}</td>
                                <td><a href="{{ $song->youtube_url }}" target="_blank">{{ $song->youtube_url }}</a></td>
                                <!-- 曲の編集 -->
                                <td>
                                    <!-- アクセス権限 ユーザーid 又は 管理者 -->
                                    @if(Auth::user()->id === $song->user_id || Gate::allows('isAdmin'))
                                    @csrf
                                    <a href="{{ route('songs.edit', ['id' => $song->id]) }}"
                                        class="btn btn-primary btn-sm">編集</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/css/style.css') }}" class="href">
@stop

@section('js')
<!-- Scripts -->
<script src="{{ mix('js/function.js') }}"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- jQuery UI -->
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
@stop