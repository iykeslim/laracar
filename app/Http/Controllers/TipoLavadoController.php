<?php

namespace App\Http\Controllers;

use App\Models\WashType;
use Illuminate\Http\Request;

class TipoLavadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $lavados = WashType::all();
        return view('lavados.index', compact('lavados'));
    }

    public function create()
    {
        return view('lavados.create');
    }

    public function store()
    {
        $lavadoData = request()->validate([
            'tipo_lavado' => ['required', 'string', 'max:255'],
        ]);

        WashType::create($lavadoData);
        return redirect('/lavado');
    }
    public function edit(WashType $lavado)
    {
        return view('lavados.edit', compact('lavado'));
    }

    public function update(WashType $lavado)
    {
        $lavadoData = request()->validate([
            'tipo_lavado' => ['required', 'string', 'max:255'],
        ]);

        $lavado->update($lavadoData);

        return redirect('/lavado');
    }

    public function delete(WashType $lavado)
    {
        $lavado->delete();
        return redirect('/lavado');
    }
}
