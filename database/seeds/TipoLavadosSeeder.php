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
        DB::table('wash_types')->insert(['tipo_lavado'=> 'Automático','precio'=>'10']);
        DB::table('wash_types')->insert(['tipo_lavado'=> 'Túnel','precio'=>'20']);
        DB::table('wash_types')->insert(['tipo_lavado'=> 'Limpieza a mano','precio'=>'30']);
        DB::table('wash_types')->insert(['tipo_lavado'=> 'Lavado en seco','precio'=>'40']);
    }
}
