<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartamentoCatalogo extends Model
{
    use HasFactory;

     protected $table ='departamentos_catalogo';

     protected $fillable =['codigo','municipio'];



}
