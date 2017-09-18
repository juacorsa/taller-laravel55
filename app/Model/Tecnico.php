<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    protected $table = 'tecnicos';
    public $timestamps = false;
    protected $fillable = ['nombre'];
}
