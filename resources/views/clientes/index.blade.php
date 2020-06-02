@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-12">
            <hr>
        <h2 class="intro-text text-center">Listado de Clientes</strong></h2>
            <hr>
        </div>
        <div><a href="/client/create" class="btn btn-sm waves-effect waves-ligh  border border-secondary rounded">Añadir Cliente</a></div>
        <div class="row pt-2 col-12">
            <hr style="width: 100%">
            <table class="table table-bordered table-striped">
                <thead class="">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Email</th>
                        <th>Detalles</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                    <tr>
                        <td>{{$client->user->name}}</td>
                        <td>{{$client->user->lastname}}</td>
                        <td>{{$client->user->dni}}</td>
                        <td>{{$client->user->email}}</td>
                        <td><a href="{{route('client.show',['client'=>$client->id])}}"
                            class="btn btn-sm waves-effect waves-ligh  border border-secondary rounded"
                            style="color: rgb(121, 61, 22)">Detalle</a></td>
                        <td>
                            <form action="{{route('client.destroy',['client'=>$client->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm waves-effect waves-ligh  border border-secondary rounded"
                            style="color: rgb(61, 46, 85)" onclick="return confirm('Está seguro de eliminar este Cliente? También se eliminaran los turnos reservados a su nombre');">Eliminar</button>
                            </td>
                        </form>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
    @endsection
