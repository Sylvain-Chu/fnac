<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musique;
use Illuminate\Support\Facades\DB;

class MusiqueController extends Controller
{
    public static function affichageMusique($musiqueID){
        return Musique::where('mus_id', $musiqueID)
        ->get();
    }

    public function index(){
        return view("musiques-list", ["musiques" => Musique::all()->sortby('mus_titre')]);
    }

    public function musiquePhoto(){
        return view("musiquePhoto", ["musiques" => Musique::all()]);
    }
    
    public function formAjoutPhoto(Request $request)
    {
        
        $request->validate([
            'photo' => 'required',
        ]);
        
        if ($request->hasFile('photo')) {

            $request->validate([
                'image' => 'mimes:jpeg,png'
            ]);
            $request->file('photo')->storeAs('img/photo', $request->file('photo')->getClientOriginalName(), 'public');


            DB::table('t_e_musique_mus')
                ->where('mus_id', 'like', $request->input('musique'))
                ->update(['mus_urlphoto' => 'storage/img/photo/' . $request->file('photo')->getClientOriginalName()]);
        }       
        return redirect($request->input('url'));
    }
}
