<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JuzgadoCatalogo extends Model
{
    use HasFactory;

    protected $table ='juzgados_catalogo';

    protected $fillable =['customid','numero','juzgado','email'];

}
