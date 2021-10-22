<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarteBleue extends Model
{
    use HasFactory;
    protected $table = "t_e_cartebleue_cab";
    protected $primaryKey = "cab_id";
    public $timestamps = false;
}
