<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_entrada');            
            $table->date('fecha_reparacion')->nullable();
            $table->date('fecha_entrega')->nullable();
            $table->string('usuario', 80)->nullable();
            $table->text('averia');
            $table->text('solucion')->nullable();
            $table->text('comentario')->nullable();
            $table->string('accesorios', 255)->nullable();
            $table->string('modelo', 80)->nullable();
            $table->float('horas')->default(0);
            $table->enum('estado', ['P', 'E', 'R'])->default('P');
            $table->integer('producto_id')->unsigned();
            $table->integer('cliente_id')->unsigned();
            $table->integer('tecnico_id')->unsigned();
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('tecnico_id')->references('id')->on('tecnicos');           
            $table->index('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entradas');
    }
}
