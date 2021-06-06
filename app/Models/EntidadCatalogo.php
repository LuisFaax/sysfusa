<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntidadCatalogo extends Model
{
    use HasFactory;

    protected $table ='entidades_catalogo';

    protected $fillable =['decision','codigo'];

}
