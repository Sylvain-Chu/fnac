<?php

namespace App\Http\Controllers;

use App\Models\Musique;
use Illuminate\Http\Request;
use App\Models\Rayon;
use Illuminate\Support\Facades\DB;

class RayonController extends Controller
{
    public function afficheRayon($idrayon = null){
        return view('rayons', ['rayons'=>Rayon::afficheRayon($idrayon)]);
    }

    public function index(){
        return view("rayons-list", ["rayons" => Rayon::all()]);
    }
    public function editRayon(){
        return view("editRayon", ["rayons" => Rayon::all(), "musiques" =>Musique::all()]);
    }

    public function ajoutRayon(Request $request){
        //dd($request->input(''));
        $musiques = $request->input('musiques');
        $nomRayon = $request->input('nomRayon');
        
        
        if($request->has('musiques')){

            DB::table('t_r_rayon_ray')->insert(
                [
                    'ray_nom' => $nomRayon]
            );
             
            $ray = DB::table('t_r_rayon_ray')->select('ray_id')->orderBy('ray_id', 'desc')->first();

            foreach($musiques as $musique){
                DB::table('t_j_rayonmusique_ram')->insert(
                    [
                        'ray_id' => $ray->ray_id,
                        'mus_id' => $musique]
                );
            }   
        }



        return back();
    }
}
