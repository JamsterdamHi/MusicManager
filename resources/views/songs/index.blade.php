@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>曲一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ url('playlist') }}" method="post" name="to_playlist">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">曲一覧</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="text-align:left">
                                <div class="input-group-append">
                                    <input type="button" class="btn btn-secondary btn-sm" value="プレイリストへ追加" onclick="{{ url('playlist') }}">
                                </div>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($songs as $song)
                                    <tr>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="choice[]" value="{{ $song->id }}">
                                        </div>
                                        </td>
                                        <td>{{ $song->mood->name }}</td>
                                        <td>{{ $song->genre->name }}</td>
                                        <td>{{ $song->name }}</td>
                                        <td>{{ $song->artist_name }}</td>
                                        <td><a href="{{ $song->youtube_url }}"></a>{{ $song->youtube_url }}</td>
                                        <td><a href="{{ url('songs/edit') }}" class="btn btn-default btn-sm">編集</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- <script>
        function run(){
            var choice = document.getElementById("choice").value;
            if (choice === '1') {
                location.href = "{{ url('playlist') }}";
            }
            else {
                location.href = "{{ url('songs') }}";
            }
        }
    </script> -->
@stop

@section('css')
@stop

@section('js')
@stop
