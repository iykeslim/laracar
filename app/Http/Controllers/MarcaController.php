<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('viewAny', Marca::class);
        $marcas = Marca::all();
        return view('marcas.index', compact('marcas'));
    }

    public function create()
    {
        $this->authorize('create', Marca::class);
        return view('marcas.create');
    }

    public function store()
    {
        $this->authorize('create', Marca::class);
        $marca = request()->validate([
            'tipo_marca' => ['required', 'string', 'max:255'],
        ]);

        Marca::create($marca);
        return redirect()->route('marca.index');
    }
    public function edit(Marca $marca)
    {
        $this->authorize('update', $marca);
        return view('marcas.edit', compact('marca'));
    }

    public function update(Marca $marca)
    {
        $this->authorize('update', $marca);

        $marcaData = request()->validate([
            'tipo_marca' => ['required', 'string', 'max:255'],
        ]);

        $marca->update($marcaData);

        return redirect()->route('marca.index');
    }

    public function destroy(Marca $marca)
    {
        $this->authorize('delete', $marca);
        $marca->delete();
        return redirect()->route('marca.index');
    }
}
