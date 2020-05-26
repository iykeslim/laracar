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
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Lavado</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($turnos as $turno)
                    <tr>
                        <td>{{$turno->identificador}}</td>
                        <td>{{$turno->client->user->name}}</td>
                        <td>{{$turno->tipo}}</td>
                        <td>{{$turno->marca}}</td>
                        <td>{{$turno->modelo}}</td>
                        <td>{{$turno->color}}</td>
                        <td>{{$turno->matricula}}</td>
                        <td>{{$turno->fecha}}</td>
                        <td>{{$turno->hora}}</td>
                        <td>{{$turno->lavado}}</td>
                        <td>{{$turno->precio}}</td>
                        <td><a href="/turno/{{$turno->id}}/edit"
                                class="btn btn-sm waves-effect waves-ligh  border border-secondary rounded"
                                style="color: rgb(121, 61, 22)">Editar</a></td>
                        <td>

                            <form action="/turno/{{$turno->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-sm waves-effect waves-ligh  border border-secondary rounded"
                                    style="color: rgb(61, 46, 85)" onclick="return confirm('Está seguro de eliminar esta Truno?');">Cancelar</button>
                        </td>
                        </form>
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
