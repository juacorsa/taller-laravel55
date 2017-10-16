<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('productos', function($productos) {
            return $productos->count() > 0;
        });

        Blade::if('clientes', function($clientes) {
            return $clientes->count() > 0;
        });

        Blade::if('tecnicos', function($tecnicos) {
            return $tecnicos->count() > 0;
        });     

        Blade::if('entradas', function($entradas) {
            return $entradas->count() > 0;
        });     

        Blade::if('hoy', function($fecha) {
            $hoy = Carbon::today();
            $dia_carbon = $hoy->day;
            $mes_carbon = $hoy->month;
            $año_carbon = $hoy->year;            
            list($año_entrada, $mes_entrada, $dia_entrada) = explode('-', $fecha);            
            return ($dia_carbon == $dia_entrada && $mes_carbon == $mes_entrada && $año_carbon == $año_entrada);
        });     

        Blade::if('ayer', function($fecha) {
            $hoy = Carbon::yesterday();
            $dia_carbon = $hoy->day;
            $mes_carbon = $hoy->month;
            $año_carbon = $hoy->year;            
            list($año_entrada, $mes_entrada, $dia_entrada) = explode('-', $fecha);            
            return ($dia_carbon == $dia_entrada && $mes_carbon == $mes_entrada && $año_carbon == $año_entrada);
        });     

        Blade::if('hacevariosdias', function($fecha) {
            $hoy = Carbon::today();
            list($año_entrada, $mes_entrada, $dia_entrada) = explode('-', $fecha);                        
            $fecha_entrada = Carbon::create($año_entrada, $mes_entrada, $dia_entrada, 0,0,0);            
            return $hoy->diffInDays($fecha_entrada) > 2;
        });     

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         $this->app->bind('App\Repositories\Interfaces\ProductoRepositoryInterface', 
            'App\Repositories\ProductoRepository');

         $this->app->bind('App\Repositories\Interfaces\TecnicoRepositoryInterface', 
            'App\Repositories\TecnicoRepository');

         $this->app->bind('App\Repositories\Interfaces\ClienteRepositoryInterface', 
            'App\Repositories\ClienteRepository');

         $this->app->bind('App\Repositories\Interfaces\EntradaRepositoryInterface', 
            'App\Repositories\EntradaRepository');

    }
}
