<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Musique;

class GenreController extends Controller
{
    public function afficheGenre($genre = null){
        return view('genres', ['genres'=>Genre::rechercheGenre($genre)]);
    }

    public function index(){
        return view("genres-list", ["genres" => Genre::all()]);
    }

}
