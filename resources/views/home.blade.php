@extends('adminlte::page')

@section('title', 'MyPLAYLIST')

@section('content_header')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" class="href">
    <p class="h1"><small class="text-muted">My</small>PLAYLIST</p>
@stop

@section('content')
    <div class="row mt-5">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                                <tbody>
                                    @foreach($playlists as $playlist)
                                        <tr>
                                            <td><a href="{{ route('playlist.show', ['id' => $playlist->id]) }}">{{ $playlist->name }}</a></td>
                                            <td>
                                                <div class="text-right">  
                                                    <form id="delete_{{ $playlist->id }}" action="{{ route('playlist.destroy', ['id' => $playlist->id]) }}" method="POST">
                                                        @csrf
                                                            <a href="#" data-id="{{ $playlist->id }}" onclick="deletePost(this)" class="btn btn-outline-danger btn-sm">削除</a>
                                                    </form>
                                                </div>  
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>

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

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

