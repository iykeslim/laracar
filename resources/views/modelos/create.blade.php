@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('modelo.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Añadir Nuevo Modelo</h1>
                </div>

                <div class="form-group row">
                    <label for="tipo_modelo" class="col-md-4 col-form-label text-md-right">Nombre</label>

                    <div class="col-md-6">
                        <input id="tipo_modelo" type="text" class="form-control @error('tipo_modelo') is-invalid @enderror"
                            name="tipo_modelo" value="{{ old('tipo_modelo') }}" autocomplete="tipo_modelo">

                        @error('tipo_modelo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row pt-4">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

            </div>


        </div>

    </form>
</div>
@endsection
