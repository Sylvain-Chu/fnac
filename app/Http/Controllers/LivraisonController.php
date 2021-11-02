<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
//use App\Http\Middleware\Auth;
use App\Models\Achat;
use App\Models\Adresse;
use App\Models\CarteBleue;
use App\Models\LigneAchat;
use App\Models\Magasin;
use App\Models\Relais;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\VarDumper\Dumper\esc;

class LivraisonController extends Controller
{

    public function typelivraison($typelivraison){
        switch ($typelivraison) {
            case 'relais':
                return view("livraison_relais", ["relais" => Relais::all()]);
                break;
            case 'domicile':
                return view("livraison_dom", ["adresses" => Adresse::where('ach_id', Auth::user()->ach_id)->get()]);
                break;
            case 'magasin':
                return view("livraison_magasin", ["magasins" => Magasin::all()]);
                break;
        }        
    }


    public function paiement($typelivraison, Request $request){
        switch ($typelivraison) {
            case 'relais':
                return view("paiement", ["carteBleues" => CarteBleue::where('ach_id', Auth::user()->ach_id)->get(), 
                                                "relai"=>$request->input('relais'), 
                                                "type" => "relais"]);
                break;
            case 'domicile':
                return view("paiement", ["carteBleues" => CarteBleue::where('ach_id', Auth::user()->ach_id)->get(), 
                                                "dom"=>$request->input('adresses'), 
                                                "type" => "dom"]);
                break;
            case 'magasin':
                return view("paiement", ["carteBleues" => CarteBleue::where('ach_id', Auth::user()->ach_id)->get(), 
                                                "mag"=>$request->input('magasins'), 
                                                "type" => "mag"]);
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

        $b = new Achat();
        $b->timestamps = false;
        $b->ach_id = $request->input("ach_id"); 
        
        if ($request->input("type") == 'relais') {
            $b->rel_id = $request->input("relai");
        }elseif($request->input("type") == 'dom'){
            $b->adr_id = $request->input("dom");

        }elseif($request->input("type") == 'mag'){
            $b->mag_id = $request->input("mag");

        }

        $b->cab_id = $request->input('cab_id');
        $b->aca_date = date('Y-m-d', time()); 
        $b->save();

        $aca_id = DB::table('t_e_achat_aca')->max('aca_id');        

        foreach(session('lePanier')[0] as $k => $v){            
            DB::table('t_j_ligneachat_lea')->insert([
                'aca_id' => $aca_id,
                'mus_id' => $k,                
                'lea_quantite' => $v
            ]);

            $qqtAvant = DB::table('t_e_musique_mus')
                    ->select('mus_stock')
                    ->where('mus_id', $k)
                    ->get();

            $qqtFinal = $qqtAvant[0]->mus_stock - $v;

            DB::table('t_e_musique_mus')
                    ->where('mus_id', $k)
                    ->update(['mus_stock' => $qqtFinal]);
            
            $qqtFinal = 0;
        }       

        session()->forget('panier');
        session()->forget('lePanier');


        return view("resumeCommande");
    }
    
}
