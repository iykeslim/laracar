@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-12">
            <hr>
        <h2 class="intro-text text-center">Detalles del cliente  <strong>{{$user->name}}</strong></h2>
            <hr>
        </div>

        <div class="row pt-2 col col-12">

            <dl class="row offset-3">
                <dt class="col-sm-3">Nombre:</dt>
                <dd class="col-sm-9">{{$user->name}} {{$user->lastname}}.</dd>

                <dt class="col-sm-3">DNI:</dt>
                <dd class="col-sm-9">{{$user->dni}}</dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{$user->email}}</dd>

                <dt class="col-sm-3 text-truncate">Teléfono</dt>
                <dd class="col-sm-9">{{$user->client->telefono}}</dd>

                <dt class="col-sm-3">Dirección</dt>
                <dd class="col-sm-9">{{$user->client->direccion}}</dd>

                <dt class="col-3">Acciones:</dt>
                <dd class="col-9 d-flex align-items-baseline">
                    <a href="/cliente/{{$user->id}}/edit"
                        class="mr-5 btn btn-md waves-effect waves-ligh  border border-secondary rounded"
                        style="color: rgb(61, 46, 85)">Editar Perfil</a>
                    <a href="/turno/{{$user->id}}/create"
                        class=" btn btn-md waves-effect waves-ligh  border border-secondary rounded"
                        style="color: rgb(82, 38, 38)">Reservar Turno</a>
                </dd>
            </dl>

        </div>
        <div class="row pt-2 col-12">
            <hr style="width: 100%">
            <table class="table table-bordered table-striped">
                <thead class="">
                    <tr>
                        <th>Identificador</th>
                        <th>TipoVeiculo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Color</th>
                        <th>Matricula</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Lavado</th>
                        <th>Precio</th>
                        <th>Editar</th>
                        <th>Cancelar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($turnos as $turno)
                    <tr>
                        <td>{{$turno->identificador}}</td>
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
                            <button type="submit" class="btn btn-sm waves-effect waves-ligh  border border-secondary rounded"
                            style="color: rgb(61, 46, 85)">Cancelar</button>
                            </td>
                        </form>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
    @endsection
