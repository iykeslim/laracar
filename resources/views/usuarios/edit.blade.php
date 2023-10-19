@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('systemUser.update', ['systemUser' => $systemUser->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">

                <div class="col col-12">
                    <hr>
                    <h2 class="intro-text text-center">Edit User: {{ $systemUser->user->name }} {{ $systemUser->user->lastname }}</h2>
                    <hr>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') ?? $systemUser->user->name }}" autocomplete="name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="lastname" class="col-md-4 col-form-label text-md-right">Last Name</label>

                    <div class="col-md-6">
                        <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror"
                            name="lastname" value="{{ old('lastname') ?? $systemUser->user->lastname }}" autocomplete="lastname">

                        @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="dni" class="col-md-4 col-form-label text-md-right">ID Number</label>

                    <div class="col-md-6">
                        <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni"
                            value="{{ old('dni') ?? $systemUser->user->dni }}" autocomplete="dni">

                        @error('dni')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>

                    <div class="col-md-6">

                        <select name="role" id="role" class="form-control">
                            <option value="administrador" @if($systemUser->role == 'administrador') selected @endif>Administrator</option>
                            <option value="usuario" @if($systemUser->role == 'usuario') selected @endif>User</option>
                        </select>
                        {{-- <input id="role" type="role"
                                    class="form-control @error('role') is-invalid @enderror" name="role"
                                    value="{{ old('role') }}" autocomplete="role"> --}}

                        @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') ?? $systemUser->user->email }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row pt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </div>


        </div>

    </form>
</div>
@endsection
