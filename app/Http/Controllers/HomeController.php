<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function landing(){

        $genres = Genre::where('isDeleted',0)->get();
        return view('landing', compact('genres'));
    }
}
