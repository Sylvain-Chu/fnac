<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    public function index(){
        return view("commandes-list", ["commandes" => Achat::all()]);
    }  


    public static function mesCommandes(){

        $idAcheteur = Auth::user()->ach_id;


        //$commandes = Achat::where('ach_id', $idAcheteur)->get();
        $commandes = Achat::all();


        return view("mesCommandes", ["mesCommandes" => $commandes]);

    }
}
