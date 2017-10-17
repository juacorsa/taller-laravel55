<?php

use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    public function run()
    {
        DB::table('clientes')->insert(['nombre' => 'Salvador Mira']);        
        DB::table('clientes')->insert(['nombre' => 'Eduardo Rallo']);        
        DB::table('clientes')->insert(['nombre' => 'Hotel Caro']);        
		DB::table('clientes')->insert(['nombre' => 'Hotel Primus']);        
		DB::table('clientes')->insert(['nombre' => 'Entorno Empresarial']);                
    }
}
