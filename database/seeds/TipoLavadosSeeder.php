<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoLavadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wash_types')->insert(['tipo_lavado'=> 'Automático']);
        DB::table('wash_types')->insert(['tipo_lavado'=> 'Túnel']);
        DB::table('wash_types')->insert(['tipo_lavado'=> 'Limpieza a mano']);
        DB::table('wash_types')->insert(['tipo_lavado'=> 'Lavado en seco']);
    }
}
