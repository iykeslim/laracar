<?php

namespace App\Http\Controllers;

use App\Models\SystemUsers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (is_null(auth()->user()->systemuser)) {
            return redirect('/home');
        } elseif (auth()->user()->systemuser->role != "administrador") {
            return redirect('/home');
        }
        $usuarios = SystemUsers::all()->whereNull('deleted_at');
        // $usuarios = DB::table('users')->whereNull('deleted_at')->get();
        // dd($usuarios);
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {

        if (is_null(auth()->user()->systemuser)) {
            return redirect('/home');
        } elseif (auth()->user()->systemuser->role != "administrador") {
            return redirect('/home');
        }

        return view('usuarios.create');
    }

    public function store()
    {

        if (is_null(auth()->user()->systemuser)) {
            return redirect('/home');
        } elseif (auth()->user()->systemuser->role != "administrador") {
            return redirect('/home');
        }

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

        $role = request()->validate([
            'role' => 'required|string',
        ]);

        SystemUsers::create(array_merge(
            $role,
            [
                'user_id' => $user_id,
            ]
        ));

        return redirect('/usuario');
    }

    public function show(User $user)
    {
        if (is_null(auth()->user()->systemuser)) {
            return redirect('/home');
        } elseif (auth()->user()->systemuser->role != "administrador") {
            return redirect('/home');
        }

        return view('usuarios.show', compact('user'));
    }

    public function edit(User $user)
    {
        if (is_null(auth()->user()->systemuser)) {
            return redirect('/home');
        } elseif (auth()->user()->systemuser->role != "administrador") {
            return redirect('/home');
        }
        return view('usuarios.edit', compact('user'));
    }

    public function update(User $user)
    {
        if (is_null(auth()->user()->systemuser)) {
            return redirect('/home');
        } elseif (auth()->user()->systemuser->role != "administrador") {
            return redirect('/home');
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

        $usuario = request()->validate([
            'role'=>['required','string'],
        ]);

        $user->systemuser->update($usuario);

        return redirect('/usuario');
    }

    public function delete(User $user)
    {
        if (is_null(auth()->user()->systemuser)) {
            return redirect('/home');
        } elseif (auth()->user()->systemuser->role != "administrador") {
            return redirect('/home');
        }

        $user->delete();
        return redirect('/usuario');
    }
}
