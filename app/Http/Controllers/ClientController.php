<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Turno;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store()
    {
        $user = request()->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'dni' => 'required|string|max:255|unique:users|regex:/([0-9]{2})([.])([0-9]{3})([.])([0-9]{3})$/i',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $userPass = Hash::make(request()->validate([
            'password' => 'required|string',
        ])['password']);

        User::create(array_merge(
            $user,
            ['password' => $userPass,]
        ));

        $user_id = DB::table('users')->where('email', request('email'))->value('id');

        $cliente = request()->validate([
            'telefono' => 'required|string',
            'direccion' => 'required|string',
        ]);

        Client::create(array_merge(
            $cliente,
            [
                'user_id' => $user_id,
            ]
        ));

        return redirect("/home");
    }

    public function edit(User $user)
    {
        if (!is_null(auth()->user()->client)) {
            $this->authorize('view', $user->client);
        }
        return view('clientes.edit', compact('user'));
    }

    public function update(User $user)
    {
        if (!is_null(auth()->user()->client)) {
            $this->authorize('view', $user->client);
        }
        $userdata = request()->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'dni' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id), 'regex:/([0-9]{2})([.])([0-9]{3})([.])([0-9]{3})$/i'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        $userPass = Hash::make(request()->validate([
            'password' => 'required|string',
        ])['password']);

        $user->update(array_merge(
            $userdata,
            [
                'password' => $userPass,
            ]
        ));

        $cliente = request()->validate([
            'telefono' => 'required|string',
            'direccion' => 'required|string',
        ]);

        $user->client->update($cliente);

        return redirect("/home");
    }

    public function show(User $user)
    {
        if (!is_null(auth()->user()->client)) {
            $this->authorize('view', $user->client);
        }

        $turnos = $user->client->turnos;

        return view('clientes.show', compact('user', 'turnos'));
    }

    public function delete(User $user)
    {

        $user->delete();
        return redirect('/cliente');
    }

    public function index()
    {

        // $this->authorize('viewAny');
        $clientes = Client::all();
        return view('clientes.index', compact('clientes'));
    }
}
