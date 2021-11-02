<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Adresse;
use App\Models\Pays;

class AdresseController extends Controller
{
    public function index(){
        return view("mesCoordonnees", ["adresses" => Adresse::all()], ["pays" => Pays::all()]);
    }

    public function editCoordonnees(Request $request){
        $request->validate([
            'adr_nom' => 'required',
            'adr_type' => 'required',
            'adr_rue' => 'required',
            'adr_rue' => 'required',
            'adr_ville' => 'required'
        ]);

        $adr_nom = $request->input('adr_nom');
        $adr_type = $request->input('adr_type');
        $adr_rue = $request->input('adr_rue');
        $adr_cp = $request->input('adr_rue');
        $adr_ville = $request->input('adr_ville');

        DB::table('t_e_adresse_adr')
              ->where('ach_id', Auth::user()->ach_id)
              ->update(['adr_nom' => $adr_nom], 
              ['adr_type' => $adr_type], 
              ['adr_rue' => $adr_rue], 
              ['adr_cp' => $adr_cp], 
              ['adr_ville' => $adr_ville]);
        return back();
    }
    
    public function addCoordonnees(Request $request){
        $request->validate([
            'adr_nom' => 'required',
            'adr_rue' => 'required',
            'adr_rue' => 'required',
            'adr_ville' => 'required'
        ]);

        $adresse = new Adresse();
        $adresse->ach_id = Auth::user()->ach_id;
        $adresse->adr_nom = $request->input('adr_nom');
        $adresse->adr_type = $request->input('typeAdresse');
        $adresse->adr_rue = $request->input('adr_rue');
        $adresse->adr_complementrue = $request->input('adr_complementrue');
        $adresse->adr_cp = $request->input('adr_cp');
        $adresse->adr_ville = $request->input('adr_ville');
        $adresse->pay_id = $request->input('adr_pay');
        $adresse->save();

        return back();
    }
}
