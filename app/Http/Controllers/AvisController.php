<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\AvisAbusif;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AvisController extends Controller
{
    public static function trouverAvis($idMus)
    {
        return Avis::where('mus_id', $idMus)
            ->orderby('avi_date', 'desc')
            ->get();
    }

    public static function calculMoyenneAvis($idMus)
    {
        $avis = AvisController::trouverAvis($idMus);
        $nbrAvis = $avis->count();
        $moyenne = 0;
        $totalNote = 0;

        foreach ($avis as $avi) {
            $totalNote += $avi->avi_note;
        }

        if ($nbrAvis != 0) {
            $moyenne =  round($totalNote / $nbrAvis, 2);
        } else {
            $moyenne = null;
        }
        return $moyenne;
    }

    public static function publieAvis(Request $request)
    {
        $b = new Avis;
        $b->timestamps = false;
        $b->ach_id = $request->input("id_ach"); 
        $b->mus_id = $request->input("id_mus"); 
        $b->avi_date = date("Y-m-d");
        $b->avi_titre = $request->input("titre");
        $b->avi_detail = $request->input("avis");
        $b->avi_note = $request->input("note");
        $b->avi_nbutileoui = 0;
        $b->avi_nbutilenon = 0;
        $b->save();

        return back();
    }


    public function updateUtileOui(Request $request)
    {
        // if ($_SESSION["like"] == null) {
        //     $_SESSION["like"] = 1;
            DB::table('t_e_avis_avi')
            ->where('avi_id', $request->input("id"))
            ->increment('avi_nbutileoui');
        //}
        return back();
    }
    public function updateUtileNon(Request $request)
    {
        // if ($_SESSION["dislike"] == null) {
        //     $_SESSION["dislike"] = 1;
            DB::table('t_e_avis_avi')
            ->where('avi_id', $request->input("id"))
            ->increment('avi_nbutilenon');
        //}

        return back();
    }

    public function signalerAvis(Request $request){
        $avi_id =  $request->input('id_avi');
        $id_ach =  $request->input('id_ach');
        
        DB::table('t_j_avisabusif_ava')
        ->insert(
            ['ach_id' => $id_ach,
             'avi_id' => $avi_id]
        );
        return back();
    }

    public static function avisSignaler(){
        return AvisAbusif::all();
    }

    
}
