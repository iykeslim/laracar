<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\ModelType;

class ModeloController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $modelos = ModelType::all();
        return view('modelos.index', compact('modelos'));
    }

    public function create()
    {
        return view('modelos.create');
    }

    public function store()
    {
        $modelo = request()->validate([
            'tipo_modelo' => ['required', 'string', 'max:255'],
        ]);

        ModelType::create($modelo);
        return redirect('/modelo');
    }
    public function edit(ModelType $modelo)
    {
        return view('modelos.edit', compact('modelo'));
    }

    public function update(ModelType $modelo)
    {
        $modeloData = request()->validate([
            'tipo_modelo' => ['required', 'string', 'max:255'],
        ]);

        $modelo->update($modeloData);

        return redirect('/modelo');
    }

    public function delete(ModelType $modelo)
    {
        $modelo->delete();
        return redirect('/modelo');
    }
}
