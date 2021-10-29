<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneAchat extends Model
{
    use HasFactory;
    protected $table = "t_j_ligneachat_lea";
    protected $primaryKey = "lea_id";
    public $timestamps = false;


}
