<?php

namespace App\Http\Controllers;

use App\Models\AvisAbusif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AvisAbusifController extends Controller
{
    public function index(){
        return view("avisAbusif-list", ["avisAbusifs" => AvisAbusif::all()]);
    }

    public function supprimerAvis(Request $request){
        $avi_id =  $request->input('avi_id');
        
        DB::table('t_j_avisabusif_ava')
        ->where('avi_id', $avi_id)
        ->delete();

        DB::table('t_e_avis_avi')
        ->where('avi_id', $avi_id)
        ->delete();
        
        return back();
    }
}
