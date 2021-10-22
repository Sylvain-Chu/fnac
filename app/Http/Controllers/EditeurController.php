<?php

namespace App\Http\Controllers;

use App\Models\Editeur;
use Illuminate\Http\Request;

class EditeurController extends Controller
{
    public function index(){
        return view("editeurs-list", ["editeurs" => Editeur::all()]);
    }
}
