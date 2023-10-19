@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('washType.update', ['washType' => $washType->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Edit Wash Type</h1>
                </div>

                <div class="form-group row">
                    <label for="tipo_lavado" class="col-md-4 col-form-label text-md-right">Name</label>

                    <div class="col-md-6">
                        <input id="tipo_lavado" type="text"
                            class="form-control @error('tipo_lavado') is-invalid @enderror" name="tipo_lavado"
                            value="{{ old('tipo_lavado') ?? $washType->tipo_lavado }}" autocomplete="tipo_lavado">

                        @error('tipo_lavado')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="precio" class="col-md-4 col-form-label text-md-right">Price</label>

                    <div class="col-md-6">
                        <input id="precio" type="text" class="form-control @error('precio') is-invalid @enderror"
                            name="precio" value="{{ old('precio') ?? $washType->precio }}" autocomplete="precio">

                        @error('precio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row pt-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </div>


        </div>

    </form>
</div>
@endsection
