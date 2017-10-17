<?php

use Illuminate\Database\Seeder;

class TecnicosSeeder extends Seeder
{
    public function run()
    {
         DB::table('tecnicos')->insert(['nombre' => 'Vicente Algarra']);
         DB::table('tecnicos')->insert(['nombre' => 'Jose Bellot']);
         DB::table('tecnicos')->insert(['nombre' => 'Santiago de los Santos']);
         DB::table('tecnicos')->insert(['nombre' => 'Carlos Gimenez']);
    }
}
