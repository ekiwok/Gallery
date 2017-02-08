@extends('layouts.app')

@section('content')
    @foreach ($albums as $album)
        <div class="col-xs-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <a href="/album/{{ $album->getUuid() }}">
                    <h1>
                        {{ $album->getName() }} <span class="badge"> {{ $album->getCount() }} </span>
                    </h1>
                </a>
            </div>
        </div>
        </div>
    @endforeach
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <a href="">
                    <h1 class="text-center">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </h1>
                </a>
            </div>
        </div>
    </div>
@endsection