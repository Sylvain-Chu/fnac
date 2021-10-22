<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;
    protected $table = "t_e_adresse_adr";
    protected $primaryKey = "adr_id";
    public $timestamps = false;

    public function pays(){
        return $this->hasOne(
            Pays::class,
            "pay_id",
            "pay_id"
        );
    }

    public function acheteur(){
        return $this->hasOne(
            Acheteur::class,
            "ach_id",
            "ach_id"
        );
    }
}
