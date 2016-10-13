@extends('layout')

@section('content')
    <h1>Album: {{ $photo->album->name }}</h1>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <img src="{{ $photo->path }}" alt="">
        </div>
    </div>
    <hr>
    <a href="{{ url('albums/'.$album_id.'-'.$slug) }}" class="btn btn-sm btn-default">Cofnij</a>    
@stop