@extends('layout')

@section('content')
    <h1>Edytuj album</h1>
    
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ action('AlbumsController@update', ['id' => $album->id]) }}" class="col-sm-6">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="name">Nazwa albumu</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $album->name }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Edytuj Album</button>
        </div>
    </form>
@stop