<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;
    protected $table = "t_e_achat_aca";
    protected $primaryKey = "aca_id";
    public $timestamps = false;

    public function acheteur()
    {
        return $this->hasOne(
            Acheteur::class,
            "ach_id",
            "ach_id"
        );
    }

    public function relais(){
        return $this->hasOne(
            Relais::class,
            "rel_id",
            "rel_id"
        );
    }

    public function ligneachat(){
        return $this->belongsToMany(
            Musique::class,
            "t_j_ligneachat_lea",
            "mus_id",
            "aca_id"
        )->withPivot("lea_quantite");
    }

    public function adresse(){
        return $this->hasOne(
            Adresse::class,
            "adr_id",
            "adr_id"
        );
    }

    public function carteBleue(){
        return $this->hasOne(
            CarteBleue::class,
            "cab_id",
            "cab_id"
        );
    }

    public function magasin(){
        return $this->hasOne(
            Magasin::class,
            "mag_id",
            "mag_id"
        );
    }
}
