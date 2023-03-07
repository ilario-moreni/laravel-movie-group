@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">

                <form action="{{ route('admin.movies.update', ['movie' => $movie['slug']]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        @if ($errors->any())
                            <ul class="text-danger">
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="mb-3 mt-5">
                        <label for="" class="form-label">Aggiungi titolo</label>
                        <input type="text" class="form-control" id="" aria-describedby="" name="title"
                            value="{{ old('title') ?? $movie->title }}">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Aggiungi titolo originale</label>
                        <input type="text" class="form-control" id="" aria-describedby="" name="original_title"
                            value="{{ old('original_title') ?? $movie->original_title }}">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Aggiungi nazione di produzione</label>
                        <input type="text" class="form-control" id="" aria-describedby="" name="nationality"
                            value="{{ old('nationality') ?? $movie->nationality }}">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Aggiungi Gionro di uscita nelle sale </label>
                        <input type="text" class="form-control" id="" aria-describedby="" name="release_date"
                            value="{{ old('release_date') ?? $movie->release_date }}">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Aggiungi voto</label>
                        <input type="text" class="form-control" id="" aria-describedby="" name="vote"
                            value="{{ old('vote') ?? $movie->vote }}">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Aggiungi cast</label>
                        <input type="text" class="form-control" id="" aria-describedby="" name="cast"
                            value="{{ old('cast') ?? $movie->cast }}">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Aggiungi link locandina</label>
                        <input type="text" class="form-control" id="" aria-describedby="" name="cover_path"
                            value="{{ old('cover_path') ?? $movie->cover_path }}">
                    </div>

                    {{-- genere --}}
                    <div class="mb-3">
                        <label for="" class="form-label">Seleziona genere</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}"
                                    {{ $genre->id == old('genre_id', $movie->genre_id) ? 'selected' : '' }}>
                                    {{ $genre->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- cast --}}
                    <div class="mb-3 pb-3">
                        @foreach ($casts as $cast)
                            @if ($errors->any())
                                <input type="checkbox" value="{{ $cast->id }}" name="casts[]"
                                    {{ in_array($cast->id, old('casts', [])) ? 'checked' : '' }}>
                                <label class="form-check-label">{{ $cast->title }}</label>
                            @else
                                <input type="checkbox" value="{{ $cast->id }}" name="casts[]"
                                    {{ $movie->casts->contains($cast) ? 'checked' : '' }}>
                                <label class="form-check-label">{{ $cast->title }}</label>
                            @endif
                        @endforeach
                    </div>

                    <div class="form-group  mb-5 d-flex justify-content-end">

                        <button type="submit" class="btn btn-primary">Modifica il film</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
