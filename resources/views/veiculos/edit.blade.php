@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/vehicleType/{{$vehicleType->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Editar Veiculo</h1>
                </div>

                <div class="form-group row">
                    <label for="tipo_veiculo" class="col-md-4 col-form-label text-md-right">Nombre</label>

                    <div class="col-md-6">
                        <input id="tipo_veiculo" type="text" class="form-control @error('tipo_veiculo') is-invalid @enderror"
                            name="tipo_veiculo" value="{{ old('tipo_veiculo') ?? $vehicleType->tipo_veiculo }}" autocomplete="tipo_veiculo">

                        @error('tipo_veiculo')
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
