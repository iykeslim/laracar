<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoMarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marcas')->insert(['tipo_marca'=> 'Abarth']);
        DB::table('marcas')->insert(['tipo_marca'=> 'Alfa Romeo']);
        DB::table('marcas')->insert(['tipo_marca'=> 'Aston Martin']);
        DB::table('marcas')->insert(['tipo_marca'=> 'Audi']);
        // DB::table('marcas')->insert(['tipo_marca'=> 'BMW']);
        // DB::table('marcas')->insert(['tipo_marca'=> 'Cadillac']);
        // DB::table('marcas')->insert(['tipo_marca'=> 'Caterham']);
        // DB::table('marcas')->insert(['tipo_marca'=> 'Chevrolet']);
        // DB::table('marcas')->insert(['tipo_marca'=> 'Citroen']);
        // DB::table('marcas')->insert(['tipo_marca'=> 'Dacia']);
        // DB::table('marcas')->insert(['tipo_marca'=> 'Ferrari']);
        // DB::table('marcas')->insert(['tipo_marca'=> 'Fiat']);
        // DB::table('marcas')->insert(['tipo_marca'=> 'Ford']);
        // DB::table('marcas')->insert(['tipo_marca'=> 'Honda']);
        // DB::table('marcas')->insert(['tipo_marca'=> 'Isuzu']);
        // DB::table('marcas')->insert(['tipo_marca'=> 'Iveco']);
        // DB::table('marcas')->insert(['tipo_marca'=> 'Jaguar']);
        // DB::table('marcas')->insert(['tipo_marca'=> 'Lamborghini']);
        // DB::table('marcas')->insert(['tipo_marca'=> 'Mercedes-Benz']);

    }
}
