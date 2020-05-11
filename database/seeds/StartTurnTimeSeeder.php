<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StartTurnTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $start = date('h:i A',mktime(8,0,0,0,0,1));
        $intervalo = 10;
        $total = (10*60)/$intervalo;

        $contador = 0;

        DB::table('start_turn_times')->insert(['start_time'=> $start]);

        while($contador < $total){
            $contador++;
            $start = date('h:i A',strtotime('+'.$intervalo.' minutes',strtotime($start)));
            DB::table('start_turn_times')->insert(['start_time'=> $start]);
        }

    }
}
