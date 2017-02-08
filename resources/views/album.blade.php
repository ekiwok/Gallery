@extends('layouts.app')

@section('content')
    @foreach ($images as $image)
        <div class="col-xs-12">
            <img src="{{ $image->getUrl() }}" class="img-responsive" />
        </div>
    @endforeach
@endsection
