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
                <div class="card-body table-responsive p-0 bg-secondary">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tbody>
                                @foreach($playlists as $playlist)
                                    <tr>
                                        <td class="column-list"><a href="{{ route('playlist.show', ['id' => $playlist->id]) }}">{{ $playlist->name }}</a></td>
                                        <td>
                                            <div class="text-right">  
                                                <form id="delete_{{ $playlist->id }}" action="{{ route('playlist.destroy', ['id' => $playlist->id]) }}" method="POST">
                                                    @csrf
                                                        <a href="#" data-id="{{ $playlist->id }}" onclick="deletePost(this)" class="btn btn-outline-danger btn-sm rounded-circle">ー</a>
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
            {{ $playlists->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <!-- Scripts -->
    <script src="{{ mix('js/function.js') }}"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- jQuery UI -->
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>

    <script> console.log('Hi!'); </script>
@stop

