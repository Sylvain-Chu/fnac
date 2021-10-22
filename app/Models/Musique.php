<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musique extends Model
{
    use HasFactory;

    protected $table = "t_e_musique_mus";
    protected $primaryKey = "mus_id";
    public $timestamps = false;

    public static function rechercheMusiques($musiqueid){
            return Musique::where('mus_id', $musiqueid)->get();
        
    }

    public function genres(){
        return $this->belongsToMany(
            Genre::class,
            "t_j_genremusique_gem",
            "mus_id",
            "gen_id"
        );
    }

    public function editeur(){
        return $this->hasOne(
            Editeur::class,
            "edi_id",
            "edi_id"
        );
    }

    public function interpretes(){
        return $this->belongsToMany(
            Interprete::class,
            "t_j_interpretemusique_inn",
            "mus_id",
            "inr_id"
        );
    }

    public function favoris(){
        return $this->belongsToMany(
            Acheteur::class,
            "t_j_favori_fav",
            "ach_id",
            "mus_id"
        );
    }


    /*
    public function cherche(Request $request){
        $musiques = Musique::all();
        $found = [];
        foreach($musiques as $musique){
            if(levenshtein($musique->mus_titre, $request->get("recherche")) <4)
            $found[] = $musique;
        }

        var_dump($found);
    }*/
}
