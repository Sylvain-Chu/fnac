<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    use HasFactory;
    protected $table = "t_r_rayon_ray";
    protected $primaryKey = "ray_id";
    public $timestamps = false;
    

    public static function rechercheRayon($nomRayon){
    	return Musique::where('ray_nom', $nomRayon)
        ->join('t_j_rayonmusique_ram', 't_j_rayonmusique_ram.mus_id', '=', 't_e_musique_mus.mus_id')
        ->join('t_r_rayon_ray', 't_r_rayon_ray.ray_id', '=', 't_j_rayonmusique_ram.ray_id')
        ->get();
    }

    public function musiques(){
        return $this->belongsToMany(
            Rayon::class,
            "t_j_rayonmusique_ram",
            "mus_id",
            "ray_id"
        );
    }
}
