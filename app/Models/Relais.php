<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relais extends Model
{
    use HasFactory;
    protected $table = "t_e_relais_rel";
    protected $primaryKey = "rel_id";
    public $timestamps = false;

    public function pays(){
        return $this->hasOne(
            Pays::class,
            "pay_id",
            "pay_id"
        );
    }

    public function acheteur(){
        return $this->belongsToMany(
            Achat::class,
            "t_j_relaisacheteur_rea",
            "rel_id",
            "ach_id"
        );
    }
}
