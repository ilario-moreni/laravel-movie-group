<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = config('movies');

        foreach($movies as $movie){
            $newMovie = new Movie();

            $newMovie->title = $movie['title'];
            $newMovie->original_title = $movie['original_title'];
            $newMovie->nationality = $movie['nationality'];
            $newMovie->release_date = $movie['release_date'];
            $newMovie->vote = $movie['vote'];
            $newMovie->cast = $movie['cast'];
            $newMovie->cover_path = $movie['cover_path'];
    
            $newMovie->save();
        }
    }
}
