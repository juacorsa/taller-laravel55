<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
 	protected $table = 'productos';   
 	public $timestamps = false; 
 	protected $fillable = ['nombre'];
}
