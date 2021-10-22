<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvisAbusif extends Model
{
    use HasFactory;
    protected $table = "t_j_avisabusif_ava";
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

    public function avi()
    {
        return $this->hasOne(
            Avis::class,
            "avi_id",
            "avi_id"
        );
    }
}
