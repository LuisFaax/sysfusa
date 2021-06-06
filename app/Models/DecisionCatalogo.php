<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DecisionCatalogo extends Model
{
    use HasFactory;

    protected $table ='decisiones_catalogo';

    protected $fillable =['decision'];
}
