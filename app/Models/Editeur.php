<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editeur extends Model
{
    use HasFactory;
    protected $table = "t_e_editeur_edi";
    protected $primaryKey = "edi_id";
    public $timestamps = false;

    public function musiques(){
        return $this->hasMany(
            Musique::class,
            "edi_id",
            "edi_id"
        );
    }


}
