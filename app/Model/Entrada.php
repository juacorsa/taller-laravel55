<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $table    = 'entradas';
    public $timestamps  = true;
    protected $fillable = ['cliente_id', 'producto_id', 'tecnico_id', 'usuario', 'averia', 
    	'solucion', 'modelo', 'accesorios', 'fecha_entrada', 'comentario', 'horas', 'solucion', 
        'estado', 'fecha_reparacion'];

    public function cliente()
    {
		return $this->belongsTo('App\Model\Cliente');
    }

    public function producto()
    {
		return $this->belongsTo('App\Model\Producto');
    }

    public function tecnico()
    {
		return $this->belongsTo('App\Model\Tecnico');
    }
}
