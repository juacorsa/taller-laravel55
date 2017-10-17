<?php

use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    public function run()
    {
		DB::table('productos')->insert(['nombre' => 'Disco duro 3,5" 1 TB']);        
		DB::table('productos')->insert(['nombre' => 'Disco duro 3,5" 2 TB']);        
		DB::table('productos')->insert(['nombre' => 'Disco duro 3,5" 3 TB']);        
		DB::table('productos')->insert(['nombre' => 'Disco duro 3,5" 4 TB']);        
    }
}
