@extends('layout.app')
@section('content')
    <div class="container">
        <div class="container d-flex">
            <a href="{{route('admin.movies.create')}}"><button type="button" class="btn btn-primary mt-2">Aggiungi un nuovo Film</button></a>
        </div>
        <h2 class="my-4"> Film </h2>
        <div class="row">
            @foreach ($movies as $movie)
                <div class="col-4 my-2">
                    <a href="{{route('admin.movies.show', $movie->slug)}}">
                        <div class="card">
                            <img class="card-img-top img-fluid" src="{{$movie['cover_path']}}">
                            <div class="card-body">
                                <h5>{{ $movie->title }}</h5>

                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
