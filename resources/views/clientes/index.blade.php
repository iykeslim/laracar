@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-12">
            <hr>
        <h2 class="intro-text text-center">Listado de Clientes</strong></h2>
            <hr>
        </div>
        <div><a href="/cliente/create" class="btn btn-sm waves-effect waves-ligh  border border-secondary rounded">Añadir Cliente</a></div>
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
                    @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{$cliente->user->name}}</td>
                        <td>{{$cliente->user->lastname}}</td>
                        <td>{{$cliente->user->dni}}</td>
                        <td>{{$cliente->user->email}}</td>
                        <td><a href="/cliente/{{$cliente->user_id}}"
                            class="btn btn-sm waves-effect waves-ligh  border border-secondary rounded"
                            style="color: rgb(121, 61, 22)">Detalle</a></td>
                        <td>
                            <form action="/cliente/{{$cliente->user_id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm waves-effect waves-ligh  border border-secondary rounded"
                            style="color: rgb(61, 46, 85)">Eliminar</button>
                            </td>
                        </form>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
    @endsection
