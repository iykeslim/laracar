@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('turno.update',['turno'=>$turno->id])}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Editar Turno</h1>
                </div>

                <div class="form-group row">
                    <label for="tipo" class="col-md-4 col-form-label text-md-right">Tipo de Veiculo</label>

                    <div class="col-md-6">

                        <select name="tipo" id="tipo" class="form-control @error('tipo') is-invalid @enderror">
                            @foreach ($tipos_autos as $tipo)
                            <option value="{{$tipo->tipo_veiculo}}">{{$tipo->tipo_veiculo}}</option>
                            @endforeach
                        </select>
                        {{-- <input id="tipo" type="text" class="form-control @error('tipo') is-invalid @enderror"
                            name="tipo" value="{{ old('tipo') }}" autocomplete="tipo"> --}}

                        @error('tipo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="marca" class="col-md-4 col-form-label text-md-right">Marca</label>

                    <div class="col-md-6">
                        <select name="marca" id="marca" class="form-control @error('marca') is-invalid @enderror">
                            @foreach ($marcas as $marca)
                            <option value="{{$marca->tipo_marca}}">{{$marca->tipo_marca}}</option>
                            @endforeach
                        </select>
                        {{-- <input id="marca" type="text" class="form-control @error('marca') is-invalid @enderror"
                            name="marca" value="{{ old('marca') }}" autocomplete="marca"> --}}

                        @error('marca')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="modelo" class="col-md-4 col-form-label text-md-right">Modelo</label>

                    <div class="col-md-6">
                        <select name="modelo" id="modelo" class="form-control @error('modelo') is-invalid @enderror">
                            @foreach ($modelos as $modelo)
                            <option value="{{$modelo->tipo_modelo}}">{{$modelo->tipo_modelo}}</option>
                            @endforeach
                        </select>
                        {{-- <input id="modelo" type="text" class="form-control @error('modelo') is-invalid @enderror" name="modelo"
                            value="{{ old('modelo') }}" autocomplete="modelo"> --}}

                        @error('modelo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="color" class="col-md-4 col-form-label text-md-right">Color</label>

                    <div class="col-md-6">
                        <input id="color" type="text" class="form-control @error('color') is-invalid @enderror"
                            name="color" value="{{ old('color') ?? $turno->color }}" autocomplete="color">

                        @error('color')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="matricula" class="col-md-4 col-form-label text-md-right">Matricula</label>

                    <div class="col-md-6">
                        <input id="matricula" type="matricula"
                            class="form-control @error('matricula') is-invalid @enderror" name="matricula"
                            value="{{ old('matricula') ?? $turno->matricula }}" autocomplete="matricula">

                        @error('matricula')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fecha" class="col-md-4 col-form-label text-md-right">Fecha</label>

                    <div class="col-md-6">
                        <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror"
                            name="fecha" value="{{ old('fecha') ?? $fecha }}" autocomplete="fecha">

                        @error('fecha')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="hora" class="col-md-4 col-form-label text-md-right">Hora</label>

                    <div class="col-md-6">
                        <select name="hora" id="hora" class="form-control  @error('hora') is-invalid @enderror"
                            name="hora">
                            @foreach ($horarios as $hora)
                            <option value="{{$hora->start_time}}">{{$hora->start_time}}</option>
                            @endforeach
                        </select>
                        {{-- <input id="hora" type="text" class="form-control @error('hora') is-invalid @enderror"
                            name="hora" value="{{ old('hora') }}" autocomplete="hora"> --}}

                        @error('hora')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="lavado" class="col-md-4 col-form-label text-md-right">Tipo de Lavado</label>

                    <div class="col-md-6">
                        <select name="lavado" id="lavado" class="form-control @error('lavado') is-invalid @enderror">
                            @foreach ($tipo_lavados as $tipo_lavado)
                            <option value="{{$tipo_lavado->tipo_lavado}}">{{$tipo_lavado->tipo_lavado}}: ${{$tipo_lavado->precio}}</option>
                            @endforeach
                        </select>
                        {{-- <input id="lavado" type="text" class="form-control @error('lavado') is-invalid @enderror"
                            name="lavado" value="{{ old('lavado') }}" autocomplete="lavado"> --}}

                        @error('lavado')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row pt-4">
                    <div class="col col-7 offset-3 d-flex align-items-baseline justify-content-between">

                        <button type="submit" class="btn btn-primary" style="color: rgb(233, 225, 235)">Actualizar</button>

                        <a href="{{route('client.show',['client'=>$turno->client_id])}}"
                            class="btn btn-md btn-primary rounded"
                          style="color: rgb(233, 225, 235)" >Regresar</a>
                        </div>
                </div>

            </div>


        </div>

    </form>
</div>
@endsection
