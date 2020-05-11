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
        $marcas = Marca::all();
        return view('marcas.index', compact('marcas'));
    }

    public function create()
    {
        return view('marcas.create');
    }

    public function store()
    {
        $marca = request()->validate([
            'tipo_marca' => ['required', 'string', 'max:255'],
        ]);

        Marca::create($marca);
        return redirect('/marca');
    }
    public function edit(Marca $marca)
    {
        return view('marcas.edit', compact('marca'));
    }

    public function update(Marca $marca)
    {
        $marcaData = request()->validate([
            'tipo_marca' => ['required', 'string', 'max:255'],
        ]);

        $marca->update($marcaData);

        return redirect('/marca');
    }

    public function delete(Marca $marca)
    {
        $marca->delete();
        return redirect('/marca');
    }
}
