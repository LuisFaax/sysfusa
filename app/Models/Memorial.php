<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memorial extends Model
{
    use HasFactory;

    protected $fillable =['numero','comentario','archivo','radicado_id','user_id'];

    protected $table ='memoriales';
}
