<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcesoCatalogo extends Model
{
    use HasFactory;

    protected $table ='procesos_catalogo';

    protected $fillable =['proceso'];

}
