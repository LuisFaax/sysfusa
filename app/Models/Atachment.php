<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atachment extends Model
{
    use HasFactory;

    protected $fillable = ['cup','user_id','type','filename'];
    
    protected $table = 'temp_atachments';
}
