@extends('layout')

@section('content')
    <h1>Albums</h1>
    <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nazwa albumu</th>
                <th>Data utworzenia</th>
                <th>Ilośc zdjęć</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($albums as $key => $album)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $album->name }}</td>
                        <td>{{ $album->created_at }}</td>
                        <td>{{ $album->numberOfphotos }}</td>
                        <td>
                            <a href="{{ url('albums/'.$album->id.'-'.$album->slug ) }}" class="btn btn-xs btn-primary">wyświetl</a>
                        </td>
                        <td>
                            <a href="{{ url('albums/'.$album->id.'/edit') }}" class="btn btn-xs btn-info">zmień nazwę</a>
                        </td>
                        <td>
                            <form action="{{ url('albums/'.$album->id) }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button class="btn btn-xs btn-danger" type="submit">Usuń</button>
                            </form>
                        </td>
                @endforeach
            </tbody>
          </table>
      </div>
@stop