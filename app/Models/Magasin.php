<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magasin extends Model
{
    use HasFactory;
    protected $table = "t_r_magasin_mag";
    protected $primaryKey = "mag_id";
    public $timestamps = false;
}
