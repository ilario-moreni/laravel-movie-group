<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie as Movie;

class PageController extends Controller
{
    public function index(){
        return view('home');
    }
}