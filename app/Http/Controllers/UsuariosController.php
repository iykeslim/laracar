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
        $this->authorize('viewAny', SystemUsers::class);
        $systemUsers = SystemUsers::all()->whereNull('deleted_at');
        return view('usuarios.index', compact('systemUsers'));
    }

    public function show(SystemUsers $systemUser)
    {
        $this->authorize('view', $systemUser);

        return view('usuarios.show', compact('systemUser'));
    }

    public function create()
    {
        $this->authorize('create', SystemUsers::class);
        return view('usuarios.create');
    }

    public function store()
    {
        $this->authorize('create', SystemUsers::class);

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

        return redirect()->route('systemUser.index');
    }

    public function edit(SystemUsers $systemUser)
    {
        $this->authorize('update',$systemUser);
        return view('usuarios.edit', compact('systemUser'));
    }

    public function update(SystemUsers $systemUser)
    {

        $this->authorize('update',$systemUser);

        $userdata = request()->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'dni' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($systemUser->user->id), 'regex:/([0-9]{2})([.])([0-9]{3})([.])([0-9]{3})$/i'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($systemUser->user->id)],
        ]);

        $userPass = Hash::make(request()->validate([
            'password' => 'required|string',
        ])['password']);

        $systemUser->user->update(array_merge(
            $userdata,
            [
                'password' => $userPass,
            ]
        ));

        $role = request()->validate([
            'role' => ['required', 'string'],
        ]);

        $systemUser->update($role);

        return redirect()->route('systemUser.index');
    }

    public function destroy(SystemUsers $systemUser)
    {
        $this->authorize('delete',$systemUser);

        $systemUser->user->delete();
        return redirect()->route('systemUser.index');
    }
}
