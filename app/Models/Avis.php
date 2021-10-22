<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    use HasFactory;
    protected $table = "t_e_avis_avi";
    protected $primaryKey = "avi_id";
    public $timestamps = false;

    public function acheteur()
    {
        return $this->hasOne(
            Acheteur::class,
            "ach_id",
            "ach_id"
        );
    }

    public function musique()
    {
        return $this->hasOne(
            Musique::class,
            "mus_id",
            "mus_id"
        );
    }

    
}
