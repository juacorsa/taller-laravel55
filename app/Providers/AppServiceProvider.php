<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
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
