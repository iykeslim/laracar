<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SystemUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();
        $user->name='administrador';
        $user->lastname='administrador';
        $user->dni='12.345.671';
        $user->email='bilbo.baggins@shire.middlearth.com';
        $user->password=Hash::make('12345678');
        $user->save();

        $user->systemuser()->create([
            'user_id'=> $user->id,
            'role'=>'administrador',
            ]);
        $user->push();
    }
}
