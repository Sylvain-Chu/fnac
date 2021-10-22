<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class CompteController extends Controller
{
    public function modifMotpasse(Request $request)
    {
        //vérifier ici si l'utilisateur est connecté

        $utilisateur = auth()->user();

        $utilisateur->ach_motpasse = Hash::make(request('password'));
        
        $utilisateur->save();


        return redirect('/dashboard');
    }


    public function modifCoordonnees(Request $request){

        $utilisateur = auth()->user();

        $utilisateur->ach_civilite = request('gender');
        $utilisateur->ach_nom = request('nom');
        $utilisateur->ach_prenom = request('prenom');
        $utilisateur->ach_mel = request('mail');
        $utilisateur->ach_pseudo = request('pseudo');
        $utilisateur->ach_telfixe = request('telfixe');
        $utilisateur->ach_telportable = request('telportable');
        
        $utilisateur->save();



        return redirect('/dashboard');
    }

}
