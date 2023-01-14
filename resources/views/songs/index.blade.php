@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>曲一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex flex-row">
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="text-align:right">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        プレイリストへ追加
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <button form="to_playlist" type="submit" class="dropdown-item">披露宴BGM</button>
                                        <button form="to_playlist" type="submit" class="dropdown-item">人前式BGM</button>
                                        <button form="to_playlist" type="submit" class="dropdown-item">ドライブ用</button>
                                    </div>
                                </div>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        ＋
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">プレイリスト作成</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <form action="{{ route('playlist.store') }}">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name">新規プレイリスト名</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="プレイリストのタイトルを入力">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                        <button type="submit" class="btn btn-primary">登録</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                        <form id="to_playlist" action="{{ route('playlist.store') }}" method="POST">
                        @csrf
                            <tbody>
                                @foreach ($songs as $song)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="songs[]" value="{{ $song->id }}">
                                            </div>
                                        </td>
                                        <td>{{ $song->mood->name }}</td>
                                        <td>{{ $song->genre->name }}</td>
                                        <td>{{ $song->name }}</td>
                                        <td>{{ $song->artist_name }}</td>
                                        <td><a href="{{ $song->youtube_url }}"></a>{{ $song->youtube_url }}</td>
                                        <td><a href="{{ route('songs.edit', ['id' => $song->id]) }}" class="btn btn-primary btn-sm">編集</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </form>

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
