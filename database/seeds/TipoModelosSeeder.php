<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoModelosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('model_types')->insert(['tipo_modelo'=> 'Abarth 595']);
        DB::table('model_types')->insert(['tipo_modelo'=> 'Abarth 124 Spider Scorpione ']);
        DB::table('model_types')->insert(['tipo_modelo'=> 'Alfa Romeo Giulia']);
        DB::table('model_types')->insert(['tipo_modelo'=> 'Alfa Romeo Giulietta']);
        DB::table('model_types')->insert(['tipo_modelo'=> 'Alfa Romeo Stelvio']);
        DB::table('model_types')->insert(['tipo_modelo'=> 'Aston Martin DB11']);
        DB::table('model_types')->insert(['tipo_modelo'=> 'Aston Martin DBX']);
        DB::table('model_types')->insert(['tipo_modelo'=> 'Aston Martin Vantage']);
        DB::table('model_types')->insert(['tipo_modelo'=> 'Audi A1']);
        DB::table('model_types')->insert(['tipo_modelo'=> 'Audi A3']);
        DB::table('model_types')->insert(['tipo_modelo'=> 'Audi A4']);
        DB::table('model_types')->insert(['tipo_modelo'=> 'Audi A5']);
        DB::table('model_types')->insert(['tipo_modelo'=> 'Audi A6']);
        DB::table('model_types')->insert(['tipo_modelo'=> 'Audi A7']);
        DB::table('model_types')->insert(['tipo_modelo'=> 'Audi A7 Sportback']);
        DB::table('model_types')->insert(['tipo_modelo'=> 'Audi A8']);
        DB::table('model_types')->insert(['tipo_modelo'=> 'Audi Q2']);
    }
}
