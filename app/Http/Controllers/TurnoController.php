<?php

namespace App\Http\Controllers;

use App\Models\Client;
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
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TurnoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Turno::class);

        $fecha = request()->get('fecha');
        if ($fecha) {
            $turnos = Turno::where('fecha_turno', 'like', $fecha . '%')->paginate(5);
        } else {
            $turnos = Turno::paginate(5);
        }
        return view('turnos.index', compact('turnos'));
    }

    public function create()
    {
        $this->authorize('create', Turno::class);

        $horarios = StartTurnTime::all();
        $marcas = Marca::all();
        $modelos = ModelType::all();
        $tipos_autos = VehicleType::all();
        $WashTypes = WashType::all();
        $client_id = request('client_id');
        return view('turnos.create', compact('horarios', 'marcas', 'modelos', 'tipos_autos', 'WashTypes', 'client_id'));
    }

    public function store()
    {
        $this->authorize('create', Turno::class);

        if (count(Turno::withTrashed()->latest()->get()) > 0) {
            $identificador = 'T' . sprintf("%'.06d", intval(substr(Turno::withTrashed()->latest()->get()->first()->identificador, 1)) + 1);
        } else {
            $identificador = 'T' . sprintf("%'.06d", 1);
        }

        $date = Carbon::createFromFormat('Y-m-d h:i A', request('fecha') . request('hora'))->toDateTimeString();

        $turno = Validator::make(array_merge(
            request()->all(),
            [
                'identificador' => $identificador,
                'precio' => DB::table('wash_types')->where('id', request()['wash_types_id'])->value('precio'),
                'fecha_turno' => $date,
                'recepcionado' => false,
            ]
        ), [
            'vehicle_types_id' => ['required'],
            'marcas_id' => ['required'],
            'model_types_id' => ['required'],
            'wash_types_id' => ['required'],
            'precio' => ['required'],
            'color' => ['required'],
            'matricula' => ['required', 'regex:/([A-Z]{2})([0-9]{3})([A-Z]{2})$|([A-Z]{3})([0-9]{3})$/i'],
            'fecha_turno' => ['required', Rule::unique('turnos'), new sunday()],
            'identificador' => ['unique:turnos'],
            'client_id' => ['required'],
            'recepcionado' => ['required'],
        ])->validate();

        $client_id = request('client_id');

        $client = Client::findOrFail($client_id);
        $client->turnos()->create($turno);

        return redirect()->route('client.show', ['client' => $client_id]);
    }

    public function edit(Turno $turno)
    {
        $this->authorize('update', $turno);
        $horarios = StartTurnTime::all();
        $marcas = Marca::all();
        $modelos = ModelType::all();
        $tipos_autos = VehicleType::all();
        $tipo_lavados = WashType::all();
        $fecha = Carbon::parse($turno->fecha_turno)->translatedFormat('Y-m-d');
        return view('turnos.edit', compact('turno', 'horarios', 'fecha', 'marcas', 'modelos', 'tipos_autos', 'tipo_lavados'));
    }

    public function update(Turno $turno)
    {
        $this->authorize('update', $turno);


        $date = Carbon::createFromFormat('Y-m-d h:i A', request('fecha') . request('hora'))->toDateTimeString();

        $recepcionado = (request('recepcionar') == "on" ? true : false);
        $precio = WashType::find(request('wash_types_id'))['precio'];

        $update_turno = Validator::make(array_merge(
            request()->all(),
            [
                'precio' => $precio,
                'fecha_turno' => $date,
                'recepcionado' => $recepcionado,
            ]
        ), [
            'vehicle_types_id' => ['required'],
            'marcas_id' => ['required'],
            'model_types_id' => ['required'],
            'wash_types_id' => ['required'],
            'recepcionado' => ['required'],
            'precio' => ['required'],
            'color' => ['required'],
            'matricula' => ['required', 'regex:/([A-Z]{2})([0-9]{3})([A-Z]{2})$|([A-Z]{3})([0-9]{3})$/i'],
            'fecha_turno' => ['required', Rule::unique('turnos')->ignore($turno->id), new sunday()],
            'identificador' => ['unique:turnos', Rule::unique('trunos')->ignore($turno->id)],
        ])->validate();

        $vehiculo =  VehicleType::where('tipo_veiculo', request('vehicle_types_id'))->get()[0]->id;
        $mark =  Marca::where('tipo_marca', request('marcas_id'))->get()[0]->id;
        $model =  ModelType::where('tipo_modelo', request('model_types_id'))->get()[0]->id;

        $turno->update(array_merge($update_turno, [
            'vehicle_types_id' => $vehiculo,
            'marcas_id' => $mark,
            'model_types_id' => $model,
        ]));

        return redirect()->route('client.show', ['client' => $turno->client_id]);
    }

    public function destroy(Turno $turno)
    {
        $this->authorize('delete', $turno);
        $client_id = $turno->client_id;
        $turno->delete();
        return redirect()->route('client.show', ['client' => $turno->client_id]);
    }
}
