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
                            <div class="text-right">
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
