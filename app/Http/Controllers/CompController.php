<?php

namespace App\Http\Controllers;

use App\Models\Acheteur;
use Illuminate\Http\Request;
use App\Models\Musique;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompController extends Controller
{
    public function index(){
        
        $idAcheteur = Auth::user()->ach_id;

        return view("favoris-list", ["musiques" => Acheteur::where('ach_id', $idAcheteur)->get()]);
    }

    public static function ajouteComp(Request $request)
    {      
        $ach_id = Auth::user()->ach_id;
        $mus_id = $request->input('mus_id');

        $result = DB::select('select * from t_j_favori_fav where ach_id = :ach_id AND mus_id=:mus_id', [$ach_id, $mus_id]);


        if (empty($result)) {
            DB::insert('insert into t_j_favori_fav(ach_id, mus_id) values (?, ?)', [$ach_id, $mus_id]);
        }
        return back();
    }

    public static function suppComp(Request $request)
    {
        $ach_id = Auth::user()->ach_id;
        $mus_id = $request->input('mus_id');

        //DB::delete('delete from t_j_favori_fav where ach_id = :ach_id AND mus_id = :mus_id', [$ach_id, $mus_id]);

        return back();
    }
}
