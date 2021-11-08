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

    // Return a dashboard with all Clients
    public function index()
    {
        $this->authorize('viewAny', Client::class);
        $clients = Client::all();
        return view('clientes.index', compact('clients'));
    }

    // Return a dashboard with all data of a Client
    public function show(Client $client)
    {
        $this->authorize('view', $client);

        $turnos = $client->turnos;

        return view('clientes.show', compact('client', 'turnos'));
    }

    // Return a form view to create a new Client
    public function create()
    {
        $this->authorize('create',Client::class);
        return view('clientes.create');
    }

    // Function to store the new Client on the DDBB
    public function store()
    {
        $this->authorize('create',Client::class);
        $user = request()->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'dni' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
        ]);

        $userPass = Hash::make(request()->validate([
            'password' => 'required|string',
        ])['password']);

        $userCreated = User::create(array_merge($user, [
            'password' => $userPass,
        ]));

        $cliente = request()->validate([
            'telefono' => 'required|string',
            'direccion' => 'required|string',
        ]);

        Client::create(array_merge(
            $cliente,
            [
                'user_id' => $userCreated->id,
            ]
        ));

        return redirect()->route("client.index");
    }

    // Return a form view to edit the Client data
    public function edit(Client $client)
    {
        $this->authorize('update', $client);

        return view('clientes.edit', compact('client'));
    }

    // Procedure to save new Client data
    public function update(Client $client)
    {
        $this->authorize('update', $client);

        $userdata = request()->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'dni' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($client->user_id),],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($client->user_id)],
        ]);
        //  'regex:/([0-9]{2})([.])([0-9]{3})([.])([0-9]{3})$/i'

        $userPass = Hash::make(request()->validate([
            'password' => 'required|string',
        ])['password']);

        $client->user->update(array_merge(
            $userdata,
            [
                'password' => $userPass,
            ]
        ));

        $cliente = request()->validate([
            'telefono' => 'required|string',
            'direccion' => 'required|string',
        ]);

        $client->update($cliente);
        return redirect()->route("client.index");
    }


    // Procedure to delete Client
    public function destroy(Client $client)
    {
        $this->authorize('delete', $client);
        Turno::where('client_id',$client->id)->delete();
        $client->user->delete();
        return redirect()->route("client.index");
    }
}
