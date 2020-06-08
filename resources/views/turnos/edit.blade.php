@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('turno.update',['turno'=>$turno->id])}}" method="POST" autocomplete="off">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Editar Turno</h1>
                </div>

                <div class="form-group row">
                    <label for="vehicle_types_id" class="col-md-4 col-form-label text-md-right">Tipo de Veiculo</label>

                    <div class="col-md-6">
                        <input id="vehicle_types_id" type="text"
                            class="form-control @error('vehicle_types_id') is-invalid @enderror" name="vehicle_types_id"
                            value="{{ old('vehicle_types_id') ?? $turno->vehicle_types->tipo_veiculo }}"
                            autocomplete="vehicle_types_id">
                        <div id="vehicleList"></div>
                        @error('vehicle_types_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="marcas_id" class="col-md-4 col-form-label text-md-right">Marca</label>

                    <div class="col-md-6">
                        <input id="marcas_id" type="text" class="form-control @error('marcas_id') is-invalid @enderror"
                            name="marcas_id" value="{{ old('marcas_id') ?? $turno->marcas->tipo_marca}}"
                            autocomplete="marcas_id">
                        <div id="markList"></div>

                        @error('marcas_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="model_types_id" class="col-md-4 col-form-label text-md-right">Modelo</label>

                    <div class="col-md-6">
                        <input id="model_types_id" type="text"
                            class="form-control @error('model_types_id') is-invalid @enderror" name="model_types_id"
                            value="{{ old('model_types_id') ?? $turno->model_types->tipo_modelo }}"
                            autocomplete="model_types_id">
                        <div id="modelList"></div>
                        @error('model_types_id')
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
                    <label for="wash_types_id" class="col-md-4 col-form-label text-md-right">Tipo de Lavado</label>

                    <div class="col-md-6">
                        <select name="wash_types_id" id="wash_types_id"
                            class="form-control @error('wash_types_id') is-invalid @enderror">
                            @foreach ($tipo_lavados as $tipo_lavado)
                            <option value="{{$tipo_lavado->id}}">{{$tipo_lavado->tipo_lavado}}:
                                ${{$tipo_lavado->precio}}</option>
                            @endforeach
                        </select>
                        {{-- <input id="lavado" type="text" class="form-control @error('lavado') is-invalid @enderror"
                            name="lavado" value="{{ old('lavado') }}" autocomplete="lavado"> --}}

                        @error('wash_types_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="recepcionar" id="recepcionar"
                                {{ old('recepcionar') ? 'checked' : '' }}>

                            <label class="form-check-label" for="recepcionar">
                                {{ __('Recepcionar') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row pt-4">
                    <div class="col col-7 offset-3 d-flex align-items-baseline justify-content-between">

                        <button type="submit" class="btn btn-primary"
                            style="color: rgb(233, 225, 235)">Actualizar</button>

                        <a href="{{route('client.show',['client'=>$turno->client_id])}}"
                            class="btn btn-md btn-primary rounded" style="color: rgb(233, 225, 235)">Regresar</a>
                    </div>
                </div>

            </div>


        </div>

    </form>
</div>

<script>
    document.getElementById('vehicle_types_id').onkeyup = ()=>{
        var query = $("#vehicle_types_id").val();
        if(query != '')
        {
            var _token = $('input[name="_token"]').val();
             $.ajax({
              url:"{{ route('autocomplete.vehicles') }}",
              method:"POST",
              data:{query:query, _token:_token},
              success:function(data){
               $('#vehicleList').fadeIn();
               $('#vehicleList').html(data);
              }
             });
            }
        };

        document.getElementById('marcas_id').onkeyup = ()=>{
        var query = $("#marcas_id").val();
        if(query != '')
        {
            var _token = $('input[name="_token"]').val();
             $.ajax({
              url:"{{ route('autocomplete.marks') }}",
              method:"POST",
              data:{query:query, _token:_token},
              success:function(data){
               $('#markList').fadeIn();
               $('#markList').html(data);
              }
             });
            }
        };

        document.getElementById('model_types_id').onkeyup = ()=>{
        var query = $("#model_types_id").val();
        if(query != '')
        {
            var _token = $('input[name="_token"]').val();
             $.ajax({
              url:"{{ route('autocomplete.models') }}",
              method:"POST",
              data:{query:query, _token:_token},
              success:function(data){
               $('#modelList').fadeIn();
               $('#modelList').html(data);
              }
             });
            }
        };
</script>
@endsection
