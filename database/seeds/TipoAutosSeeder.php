<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoAutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_types')->insert(['tipo_veiculo'=> 'Monovolumen']);
        DB::table('vehicle_types')->insert(['tipo_veiculo'=> 'Berlina o Sedán']);
        DB::table('vehicle_types')->insert(['tipo_veiculo'=> 'Cupé']);
        DB::table('vehicle_types')->insert(['tipo_veiculo'=> 'Hatchback']);
        DB::table('vehicle_types')->insert(['tipo_veiculo'=> 'Descapotable, cabrio o cabriolet']);
        DB::table('vehicle_types')->insert(['tipo_veiculo'=> 'Roadster']);
        DB::table('vehicle_types')->insert(['tipo_veiculo'=> 'Familiar, ranchera, break o tourer']);
        DB::table('vehicle_types')->insert(['tipo_veiculo'=> 'Todoterreno']);
        DB::table('vehicle_types')->insert(['tipo_veiculo'=> 'Crossover']);
        DB::table('vehicle_types')->insert(['tipo_veiculo'=> 'SUV']);
        DB::table('vehicle_types')->insert(['tipo_veiculo'=> 'Deportivos']);
        DB::table('vehicle_types')->insert(['tipo_veiculo'=> 'Pick-up']);
    }
}
