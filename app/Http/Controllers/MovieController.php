<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie as Movie;

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
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* $request->validate([
            'title' => '',
            'original_title' => '',
            'nationality' => '',
            'release_date' => '',
            'vote' => '',
            'cast' => '',
            'cover_path' => ''
        ]); */


        $form_data = $request->all();


        $newMovie = new Movie();
        $newMovie->title = $form_data['title'];
        $newMovie->original_title = $form_data['original_title'];
        $newMovie->nationality = $form_data['nationality'];
        $newMovie->release_date = $form_data['release_date'];
        $newMovie->vote = $form_data['vote'];
        $newMovie->cast = $form_data['cast'];
        $newMovie->cover_path = $form_data['cover_path'];

        $newMovie->fill($form_data);
        $newMovie->save();

        return redirect()->route('movies.show' , $newMovie['id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        $single_movie = [
            'movie' => $movie
        ];
        return view('movies.show',$single_movie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $single_movie = [
            'movie' => $movie
        ];
        return view('movies.edit',$single_movie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);

        /* $request->validate([
            'title' => '',
            'original_title' => '',
            'nationality' => '',
            'release_date' => '',
            'vote' => '',
            'cast' => '',
            'cover_path' => ''
        ]); */


        $form_data = $request->all();

        $movie->update($form_data);

        return redirect()->route('movies.show' , $movie['id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);

        $movie->delete();
        return redirect()->route('movies.index');
    }
}