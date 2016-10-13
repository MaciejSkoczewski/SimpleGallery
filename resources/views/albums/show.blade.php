@extends('layout')

@section('content')
    <h1>Album: {{ $album->name }}</h1>
    <hr>
    <div class="row">
        <div class="col-md-12">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif   
            <form method="POST" action="{{ url('albums/'.$album->id.'/photos') }}" class="col-sm-6">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="path">Dodaj zdjęcie (URL)</label>
                    <input type="text" name="path" id="path" class="form-control" value="{{ old('path') }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Dodaj zdjęcie</button>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 gallery">
            @foreach ($album->photos->chunk(6) as $set)
                <div class="row">
                    @foreach ($set as $photo)
                        <div class="col-md-2 col-sm-2 gallery_photo">
                            <form action="{{ url('albums/'.$album->id.'/photos'.'/'.$photo->id) }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button class="btn btn-xs btn-danger" type="submit">Usuń</button>
                            </form>
                            <a href="{{ url('albums/'.$album->id.'-'.$album->slug.'/photos'.'/'.$photo->id) }}">
                                <img src="{{ $photo->path }}" alt="" style="width:160px;height:110px;">
                            </a>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>    
@stop