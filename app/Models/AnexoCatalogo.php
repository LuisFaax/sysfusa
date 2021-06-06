<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnexoCatalogo extends Model
{
    use HasFactory;

    protected $table ='anexos_catalogo';

    protected $fillable =['anexo'];
}
