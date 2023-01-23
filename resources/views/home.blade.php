@extends('adminlte::page')

@section('title', 'Dashboard')

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
                                        </tr>
                                    @endforeach
                                </tbody>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

