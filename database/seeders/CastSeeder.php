<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use App\Models\Cast;

class CastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $casts = ['Jennifer Lawrence', 'Jonnhy Depp', 'Totti', 'Brad Pitt', 'Pippo', 'Ciccio', 'Franco'];

        foreach($casts as $cast){
            $newCast = new Cast();

            $newCast->title = $cast;
            $newCast->slug = Str::slug($cast, '-');

            $newCast->save();
        }
    }
}
