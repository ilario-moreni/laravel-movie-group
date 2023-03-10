<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Illuminate\Support\Str;
use App\Models\Genre;
use App\Models\Cast;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return view('admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $casts = Cast::all();
        $genres = Genre::all();
        return view('admin.movies.create', compact('genres', 'casts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMovieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovieRequest $request)
    {
        $form_data = $request->validated();

        $slug = Movie::generateSlug($request->title);

        $form_data['slug'] = $slug;

        $newMovie = new Movie();
        $newMovie->fill($form_data);

        $newMovie->save();

        if($request->has('casts'))
            $newMovie->casts()->attach($request->casts);

        return redirect()->route('admin.movies.index')->with('message', 'Il film è stato creato correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('admin.movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        $casts = Cast::all();
        return view('admin.movies.edit', compact('movie', 'genres', 'casts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieRequest  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $form_data = $request->validated();

        $slug = Movie::generateSlug($request->title, '-');

        $form_data['slug'] = $slug;

        $movie->update($form_data);

        if($request->has('casts'))
            $movie->casts()->sync($request->casts);
        else
            $movie->casts()->detach();

        return redirect()->route('admin.movies.index')->with('message', 'La modifica del film è andata a buon fine.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        // Reindirizzamento all'index con messaggio di conferma eliminazione
        return redirect()->route('admin.movies.index')->with('message', 'La cancellazione del film è andata a buon fine.');
    }
}