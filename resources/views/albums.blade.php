@extends('layouts.app')

@section('content')
    @foreach ($albums as $album)
        <div class="col-xs-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <a href="/album/{{ $album->getUuid() }}">
                    <h1>
                        {{ $album->getName() }} <span class="badge"> {{ $album->getCount() }} </span>
                        <a href="/api/albums/{{ $album->getUuid() }}" class="remove-album">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </a>
                    </h1>
                </a>
            </div>
        </div>
        </div>
    @endforeach
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="album-name" placeholder="New album name">
                    </div>
                    <button type="submit" id="create-album" class="btn btn-default" data-action="/api/albums">
                        Create
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection