<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
//use App\Http\Middleware\Auth;
use App\Models\Achat;
use App\Models\CarteBleue;
use App\Models\LigneAchat;
use App\Models\Relais;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LivraisonController extends Controller
{

    public function typelivraison($typelivraison){
        switch ($typelivraison) {
            case 'relais':
                return view("livraison_relais", ["relais" => Relais::all()]);
                break;
            case 'domicile':
                return view("livraison_relais", ["relais" => Relais::all()]);
                break;
            case 'magasin':
                return view("livraison_relais", ["relais" => Relais::all()]);
                break;
        }        
    }


    public function paiement($typelivraison, Request $request){
        switch ($typelivraison) {
            case 'relais':
                return view("paiement", ["carteBleues" => CarteBleue::where('ach_id', Auth::user()->ach_id)->get(), "relai"=>$request->input('relais')]);
                break;
            case 'domicile':
                return view("livraison_relais", ["relais" => Relais::all()]);
                break;
            case 'magasin':
                return view("livraison_relais", ["relais" => Relais::all()]);
                break;
        }        
    }

    public function ajouterPaiement(Request $request){
        // $request->validate([
        //     'ach_id' => 'required',
        //     'typePaiement' => 'required',
        //     'cab_titulaire' => 'required',
        //     'cab_numero' => 'required',
        //     'cab_moisExpiration' => 'required',
        //     'cab_anneeExpiration' => 'required',
        //     'cab_cvs' => 'required'
        // ]);

        $b = new CarteBleue();
        $b->timestamps = false;
        $b->ach_id = $request->input("ach_id"); 
        $b->cab_type = $request->input("typePaiement"); 
        $b->cab_titulaire = $request->input("cab_titulaire"); 
        $b->cab_numero = $request->input("cab_numero"); 
        $b->cab_moisexpiration = $request->input("cab_moisExpiration"); 
        $b->cab_anneeexpiration = $request->input("cab_anneeExpiration"); 
        $b->cab_cvs = $request->input("cab_cvs");
        $b->save();
        
        return view("paiement", ["carteBleues" => CarteBleue::where('ach_id', Auth::user()->ach_id)->get()]);
        
        //dd($request->input());
    }   


    public function resumeCommande(Request $request){       
        //dd($request->input());
        $b = new Achat();
        $b->timestamps = false;
        $b->ach_id = $request->input("ach_id"); 
        $b->rel_id = $request->input("relai"); 
        $b->adr_id = null;
        $b->mag_id = null;
        $b->cab_id = $request->input('cab_id');
        $b->aca_date = date('Y-m-d', time()); 
        $b->save();

        foreach(session('panier') as $k => $v){
            DB::table('t_j_ligneachat_lea')->insert([
                'aca_id' => 22,
                'mus_id' => $k,                
                'lea_quantite' => $v
            ]);
        }

       

        return view("resumeCommande");
    }
    
}
