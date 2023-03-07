<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug'];

    public static function generateSlug($title){
        return Str::slug($title, '-');
    }

    public function movies(){
        return $this->belongsToMany(Movie::class);
    }
}
