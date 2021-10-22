<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function affichePanier(){
    	return view ("panier");
    }
}
