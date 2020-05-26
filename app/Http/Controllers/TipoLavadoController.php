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
        $this->authorize('viewAny', WashType::class);
        $washTypes = WashType::all();
        return view('lavados.index', compact('washTypes'));
    }

    public function create()
    {
        $this->authorize('create', WashType::class);
        return view('lavados.create');
    }

    public function store()
    {
        $this->authorize('create', WashType::class);
        $lavadoData = request()->validate([
            'tipo_lavado' => ['required', 'string', 'max:255'],
            'precio' => ['required', 'string', 'max:255'],
        ]);

        WashType::create($lavadoData);
        return redirect()->route('washType.index');
    }


    public function edit(WashType $washType)
    {
        $this->authorize('update', $washType);
        return view('lavados.edit', compact('washType'));
    }

    public function update(WashType $washType)
    {
        $this->authorize('update', $washType);
        $washTypeData = request()->validate([
            'tipo_lavado' => ['required', 'string', 'max:255'],
            'precio' => ['required', 'string', 'max:255'],
        ]);

        $washType->update($washTypeData);

        return redirect()->route('washType.index');
    }

    public function destroy(WashType $washType)
    {
        $this->authorize('delete', $washType);
        $washType->delete();
        return redirect()->route('washType.index');
    }
}
