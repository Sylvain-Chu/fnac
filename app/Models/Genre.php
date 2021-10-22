<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Musique;

class Genre extends Model
{
    use HasFactory;
    protected $table = "t_r_genre_gen";
    protected $primaryKey = "gen_id";
    public $timestamps = false;

    public static function rechercheGenre($nomGenre = null){

    	if($nomGenre != null){
            return Musique::where('gen_libelle', $nomGenre)->join('t_j_genremusique_gem', 't_j_genremusique_gem.mus_id', '=', 't_e_musique_mus.mus_id')->join('t_r_genre_gen', 't_r_genre_gen.gen_id', '=', 't_j_genremusique_gem.gen_id')->get();
        }else{            
            return Genre::all();
        }
    }

    public function musiques(){
        return $this->belongsToMany(
            Musique::class,
            "t_j_genremusique_gem",
            "mus_id",
            "gen_id"
        );
    }
}
