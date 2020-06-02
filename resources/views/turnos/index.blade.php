@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-12">
            <hr>
            <h2 class="intro-text text-center">Listado de Turnos</strong></h2>
            <hr>
        </div>

        <div class="row col col-3 mb-2" style="left: 41%">
            <form class="form-inline">

                <input name="fecha" class="form-control mr-sm-2" type="date" placeholder="Buscar por fecha"
                    aria-label="Search">

                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Filtrar</button>
            </form>
            <hr>
        </div>

        <div></div>
        <div class="row pt-2 col-12">
            <hr style="width: 100%">
            <table class="table table-bordered table-striped">
                <thead class="">
                    <tr>
                        <th>Identificador</th>
                        <th>Cliente</th>
                        <th>TipoVeiculo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Color</th>
                        <th>Matricula</th>
                        <th>Hora</th>
                        <th>Lavado</th>
                        <th>Precio</th>
                        <th>Recepcionado</th>
                        <th colspan="2" style="text-align: center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($turnos as $turno)
                    <tr>
                        <td>{{$turno->identificador}}</td>
                        <td>{{$turno->client->user->name}}</td>
                        <td>{{$turno->vehicle_types->tipo_veiculo}}</td>
                        <td>{{$turno->marcas->tipo_marca}}</td>
                        <td>{{$turno->model_types->tipo_modelo}}</td>
                        <td>{{$turno->color}}</td>
                        <td>{{$turno->matricula}}</td>
                        <td>{{$turno->fecha_turno}}</td>
                        <td>{{$turno->wash_types->tipo_lavado}}</td>
                        <td>{{$turno->precio}}</td>
                        {{-- <td>
                            <a href="{{route('turno.edit',['turno'=>$turno->id])}}"
                        class="btn btn-sm waves-effect waves-ligh border border-secondary rounded"
                        style="color: rgb(121, 61, 22)">Recepcionar</a>
                        </td> --}}
                        <td style="text-align: center">
                            @if ($turno->recepcionado)
                            Recepcionado
                            @else
                            No Recepcionado
                            @endif
                        </td>
                        <td>
                            <a href="{{route('turno.edit',['turno'=>$turno->id])}}" class="btn btn-sm waves-effect waves-ligh border border-secondary rounded
                                @if ($turno->recepcionado) disabled @endif" style="color: rgb(121, 61, 22)">Editar</a>
                        </td>

                        <td>
                            <form action="{{route('turno.destroy',['turno'=>$turno->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" @if ($turno->recepcionado) disabled @endif
                                    class="btn btn-sm waves-effect waves-ligh border border-secondary rounded"
                                    style="color: rgb(61, 46, 85)"
                                    onclick="return confirm('Está seguro de eliminar esta Truno?');">Cancelar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="row col col-12 justify-content-center">
            {{ $turnos->links() }}
        </div>

    </div>
    @endsection
