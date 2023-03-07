<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = ['azione', 'horror', 'fantascienza', 'comico', 'drammatico'];
        foreach ($genres as $genre) {

            $newGenre = new Genre();

            $newGenre->title = $genre;
            $newGenre->slug = Str::slug($genre, '-');

            $newGenre->save();
        }
    }
}
