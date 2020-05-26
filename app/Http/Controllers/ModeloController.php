<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\ModelType;
use Illuminate\Database\Eloquent\Model;

class ModeloController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('viewAny', ModelType::class);
        $modelos = ModelType::all();
        return view('modelos.index', compact('modelos'));
    }

    public function create()
    {
        $this->authorize('create', ModelType::class);
        return view('modelos.create');
    }

    public function store()
    {
        $this->authorize('create', ModelType::class);
        $modelo = request()->validate([
            'tipo_modelo' => ['required', 'string', 'max:255'],
        ]);

        ModelType::create($modelo);
        return redirect()->route('modelo.index');
    }

    public function edit(ModelType $modelo)
    {
        $this->authorize('update', $modelo);

        return view('modelos.edit', compact('modelo'));
    }

    public function update(ModelType $modelo)
    {
        $this->authorize('update', $modelo);
        $modeloData = request()->validate([
            'tipo_modelo' => ['required', 'string', 'max:255'],
        ]);

        $modelo->update($modeloData);

        return redirect()->route('modelo.index');
    }

    public function destroy(ModelType $modelo)
    {
        $this->authorize('delete', $modelo);
        $modelo->delete();
        return redirect()->route('modelo.index');
    }
}
