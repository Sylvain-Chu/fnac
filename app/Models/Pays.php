<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    use HasFactory;
    protected $table = "t_r_pays_pay";
    protected $primaryKey = "pay_id";
    public $timestamps = false;
}
