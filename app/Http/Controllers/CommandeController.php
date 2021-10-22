<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    public function index(){
        return view("commandes-list", ["commandes" => Achat::all()]);
    }  


    public static function mesCommandes(){

        $idAcheteur = Auth::user()->ach_id;

        return view("mesCommandes", ["mesCommandes" => Achat::where('ach_id', $idAcheteur)->orderBy('aca_id', 'desc')->get()]);
    }
}
