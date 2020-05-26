@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-12">
            <hr>
        <h2 class="intro-text text-center">Listado de Lavado</strong></h2>
            <hr>
        </div>

        <div><a href="/washType/create" class="btn btn-sm waves-effect waves-ligh  border border-secondary rounded">Añadir Lavado</a></div>

        <div class="row pt-2 col-12">
            <hr style="width: 100%">
            <table class="table table-bordered table-striped">
                <thead class="">
                    <tr>
                        <th>Lavado</th>
                        <th>Precio</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($washTypes as $washType)
                    <tr>
                        <td>{{$washType->tipo_lavado}}</td>
                        <td>{{$washType->precio}}</td>
                        <td><a href="/washType/{{$washType->id}}/edit"
                            class="btn btn-sm waves-effect waves-ligh  border border-secondary rounded"
                            style="color: rgb(121, 61, 22)">Editar</a></td>
                        <td>
                            <form action="/washType/{{$washType->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm waves-effect waves-ligh  border border-secondary rounded"
                            style="color: rgb(61, 46, 85)"  onclick="return confirm('Está seguro de eliminar este Lavado?');">Eliminar</button>
                            </td>
                        </form>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
    @endsection
