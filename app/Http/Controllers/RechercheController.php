<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interprete;
use App\Models\Musique;
use App\Models\Rayon;
use App\Models\Genre;

class RechercheController extends Controller
{
    public static function recherche(){
        
        $q = ucfirst(request()->input('q'));
        
        $resultats = Interprete::where('inr_nom', 'like', "%$q%")
                ->join('t_j_interpretemusique_inn', 't_j_interpretemusique_inn.inr_id', '=', 't_e_interprete_inr.inr_id')
                ->join('t_e_musique_mus', 't_e_musique_mus.mus_id', '=', 't_j_interpretemusique_inn.mus_id')
                ->orwhere('mus_titre', 'like', "%$q%")
                ->get();

        return $resultats;
    }


}



