@extends('layouts.app')

@section('content')
    <form>
        <div class="form-group">
            <input type="text" class="form-control" id="image-url" placeholder="Image url">
        </div>
        <button type="submit" id="add-image" class="btn btn-default" data-action="/api/albums/{{ $albumUuid }}">
            Add
        </button>
    </form>
    @foreach ($images as $image)
        <div class="col-xs-12">
            <img src="{{ $image->getUrl() }}" class="img-responsive" />
        </div>
    @endforeach
@endsection
