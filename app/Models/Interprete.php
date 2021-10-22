<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interprete extends Model
{
    use HasFactory;

    protected $table = "t_e_interprete_inr";
    protected $primaryKey = "inr_id";
    public $timestamps = false;

    public static function rechercheInterprete($nomInterprete = null){
    	if($nomInterprete != null){
            return Interprete::where('inr_nom	', $nomInterprete)->get();
        }else{
            return Interprete::all();
        }
    }
}
