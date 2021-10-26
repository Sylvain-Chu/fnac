<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function affichePanier(){
        session([ "panier" => [ ]]);
    	return view("panier");
    }

    public function commander(Request $request)
    {
        session()->push("panier", $request->get("mus_id"));

        return redirect("/");
    }
}
