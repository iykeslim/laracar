<?php

namespace App\Http\Controllers;

use App\Models\VehicleType;
use Illuminate\Http\Request;

class TipoAutoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('viewAny',VehicleType::class);
        $vehicleTypes = VehicleType::all();
        return view('veiculos.index', compact('vehicleTypes'));
    }

    public function create()
    {
        $this->authorize('create',VehicleType::class);
        return view('veiculos.create');
    }

    public function store()
    {
        $this->authorize('create',VehicleType::class);
        $veiculoData = request()->validate([
            'tipo_veiculo' => ['required', 'string', 'max:255'],
        ]);

        VehicleType::create($veiculoData);
        return redirect()->route('vehicleType.index');
    }
    public function edit(VehicleType $vehicleType)
    {
        $this->authorize('update',$vehicleType);
        return view('veiculos.edit', compact('vehicleType'));
    }

    public function update(VehicleType $vehicleType)
    {
        $this->authorize('update',$vehicleType);
        $vehicleTypeData = request()->validate([
            'tipo_veiculo' => ['required', 'string', 'max:255'],
        ]);

        $vehicleType->update($vehicleTypeData);

        return redirect()->route('vehicleType.index');
    }

    public function destroy(VehicleType $vehicleType)
    {
        $this->authorize('delete',$vehicleType);
        $vehicleType->delete();
        return redirect()->route('vehicleType.index');
    }
}
