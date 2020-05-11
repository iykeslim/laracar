<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\ModelType;
use App\Models\StartTurnTime;
use App\Models\Turno;
use App\Models\VehicleType;
use App\Models\WashType;
use App\Rules\disponible;
use App\Rules\sunday;
use App\Rules\timeNotBeforeNow;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TurnoController extends Controller
{
    public function create(User $user)
    {
        // $horarios = DB::table('start_turn_times')->select('start_time')
        // ->leftJoin('turnos','start_turn_times.start_time','=','turnos.hora')
        // ->where([['turnos.hora',null]])->orderBy('start_turn_times.id')->get();
        // dd($horarios);
        $horarios = StartTurnTime::all();
        $marcas = Marca::all();
        $modelos = ModelType::all();
        $tipos_autos = VehicleType::all();
        $tipo_lavados = WashType::all();
        return view('turnos.create',compact('horarios','marcas','modelos','tipos_autos','tipo_lavados','user'));
    }

    public function store(User $user)
    {
        if(count(Turno::withTrashed()->latest()->get())>0){
            $identificador = 'T'. sprintf("%'.06d",intval(substr(Turno::withTrashed()->latest()->get()->first()->identificador,1))+1);
        }else{
            $identificador = 'T'. sprintf("%'.06d", 1);
        }

        // dd($identificador);

        if(auth()->user()->client){
            $client_id = auth()->user()->id;
        }else
        $client_id = $user->id;

        $turno = Validator::make(array_merge(
            request()->all(),[
            'identificador'=> $identificador,
            'client_id' => $client_id,
        ]),[
            'tipo' => ['required'],
            'marca' => ['required'],
            'modelo' => ['required'],
            'lavado' => ['required'],
            'color' => ['required'],
            'matricula' => ['required','regex:/([A-Z]{2})([0-9]{3})([A-Z]{2})$|([A-Z]{3})([0-9]{3})$/i'],
            'fecha' => ['required','date','after_or_equal:yesterday',new sunday()],
            'hora' => ['required','string', new disponible(),new timeNotBeforeNow()],
            'identificador' => ['unique:turnos'],
            'client_id' => ['required'],
        ])->validate();
        $user = User::findOrFail($client_id);
        $user->client->turnos()->create($turno);

        return redirect('home');
    }

    public function update(Turno $turno){

        $turno_data = request()->validate([
            'tipo' => ['required'],
            'marca' => ['required'],
            'modelo' => ['required'],
            'lavado' => ['required'],
            'color' => ['required'],
            'matricula' => ['required','regex:/([A-Z]{2})([0-9]{3})([A-Z]{2})$|([A-Z]{3})([0-9]{3})$/i'],
            'fecha' => ['required','date','after_or_equal:yesterday',new sunday()],
            'hora' => ['required','string', new disponible(),new timeNotBeforeNow()],
            'identificador' => ['unique:turnos',Rule::unique('trunos')->ignore($turno->id)],
        ]);

        $turno->update($turno_data);

        return redirect('/cliente/'.$turno->client->user->id);
    }

    public function edit(Turno $turno)
    {
        // $this->authorize('update', $user);
        $horarios = StartTurnTime::all();
        $marcas = Marca::all();
        $modelos = ModelType::all();
        $tipos_autos = VehicleType::all();
        $tipo_lavados = WashType::all();
        return view('turnos.edit',compact('turno','horarios','marcas','modelos','tipos_autos','tipo_lavados'));
    }

    public function delete(Turno $turno){
        $client_id = $turno->client->user_id;
        $turno->delete();
        return redirect('/cliente/'.$client_id);
    }
}
