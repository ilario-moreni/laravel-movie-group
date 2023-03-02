<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use Illuminate\Support\Str;

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
            $newMovie->slug = Str::slug($movie['title'], '-');
            $newMovie->nationality = $movie['nationality'];
            $newMovie->release_date = $movie['release_date'];
            $newMovie->vote = $movie['vote'];
            $newMovie->cover_path = $movie['cover_path'];
            $newMovie->cast = $movie['cast'];
    
            $newMovie->save();
        }
    }
}
