<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
    	'cup','person_type','name','identification','identification_type','email','phone','person_type_dian','age','ethnic_group','disabled','gender','address','user_id','depto_id','city_id'
    ];

    protected $table ='tempperson';
}
