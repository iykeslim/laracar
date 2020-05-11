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
        $veiculos = VehicleType::all();
        return view('veiculos.index', compact('veiculos'));
    }

    public function create()
    {
        return view('veiculos.create');
    }

    public function store()
    {
        $veiculoData = request()->validate([
            'tipo_veiculo' => ['required', 'string', 'max:255'],
        ]);

        VehicleType::create($veiculoData);
        return redirect('/veiculo');
    }
    public function edit(VehicleType $veiculo)
    {
        return view('veiculos.edit', compact('veiculo'));
    }

    public function update(VehicleType $veiculo)
    {
        $veiculoData = request()->validate([
            'tipo_veiculo' => ['required', 'string', 'max:255'],
        ]);

        $veiculo->update($veiculoData);

        return redirect('/veiculo');
    }

    public function delete(VehicleType $veiculo)
    {
        $veiculo->delete();
        return redirect('/veiculo');
    }
}
