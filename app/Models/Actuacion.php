<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actuacion extends Model
{
    use HasFactory;

    protected $fillable = ['radicado_id',
    'fecha_registro','sustancia','interlocutor','sentencia','descripcion','archivo','actuacion_id'];
    
    protected $table ='actuaciones';


    public function radicacion()
    {
    	return $this->belongsTo(Radicado::class, 'radicado_id', 'id');
    }

    public function decision()
    {
    	return $this->hasOne(DecisionCatalogo::class, 'id','actuacion_id');
    	
    }
}
