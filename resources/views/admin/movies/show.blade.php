@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="d-flex">
                    {{-- locandina film --}}
                    <img class="w-25 rounded-1" src="{{ $movie['cover_path'] }}">
                    <div class="info ms-5">
                        {{-- titolo film --}}
                        <h4>{{ $movie['tilte'] }}</h4>
                        {{-- titolo originale --}}
                        <h5>{{ $movie['original_title'] }}</h5>
                        {{-- nazione --}}
                        <h5>{{ $movie['nationality'] }}</h5>
                        {{-- relase date --}}
                        <h5>{{ $movie['release_date'] }}</h5>
                        {{-- vote --}}
                        <h5>{{ $movie['vote'] }}</h5>
                        {{-- genre --}}
                        @if($movie['genre_id'])
                            <p><strong>Genere: </strong> {{ $movie->genre->title }}</p>
                        @endif
                        {{-- cast --}}
                        <p>
                            @if (sizeof($movie->casts))
                                <strong>Cast: </strong>
                                @foreach ($movie->casts as $cast)
                                    {{ $cast->title }}
                                @endforeach
                            @endif
                        </p>
                        <div class="d-flex">
                            <h3>Noleggia il film</h3>
                            <a href="" class="btn btn-warning btn-square ms-2">Noleggia</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="edit my-5">
                <a href="{{ route('admin.movies.edit', $movie->slug) }}" class="btn btn-info btn-square">Modifica</a>
            </div>

            <form action="{{ route('admin.movies.destroy', ['movie' => $movie['slug']]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Cancella</button>
            </form>
        </div>
    </div>
