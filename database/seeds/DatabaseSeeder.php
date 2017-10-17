<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{    
    public function run()
    {
        $this->call(TecnicosSeeder::class);
        $this->call(ProductosSeeder::class);
        $this->call(ClientesSeeder::class);
    }
}
