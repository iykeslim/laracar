@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('marca.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Añadir Nuevo Marca</h1>
                </div>

                <div class="form-group row">
                    <label for="tipo_marca" class="col-md-4 col-form-label text-md-right">Nombre</label>

                    <div class="col-md-6">
                        <input id="tipo_marca" type="text" class="form-control @error('tipo_marca') is-invalid @enderror"
                            name="tipo_marca" value="{{ old('tipo_marca') }}" autocomplete="tipo_marca">

                        @error('tipo_marca')
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
