<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acheteur extends Model
{

    use HasFactory;
    protected $table = "t_e_acheteur_ach";
    protected $primaryKey = "ach_id";
    public $timestamps = false;
    
    public function avis()
    {
        return $this->hasMany(
            Avis::class,
            "ach_id",
            "ach_id"
        );
    }

    public function genres(){
        return $this->belongsToMany(
            Genre::class,
            "t_j_genremusique_gem",
            "mus_id",
            "gen_id"
        );
    }


    public function favoris(){
        return $this->belongsToMany(
            Musique::class,
            "t_j_favori_fav",
            "ach_id",
            "mus_id"
        );
    }
}
