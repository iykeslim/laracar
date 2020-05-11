@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-12">
            <hr>
        <h2 class="intro-text text-center">Listado de Veiculo</strong></h2>
            <hr>
        </div>

        <div><a href="/veiculo/create" class="btn btn-sm waves-effect waves-ligh  border border-secondary rounded">Añadir Veiculo</a></div>

        <div class="row pt-2 col-12">
            <hr style="width: 100%">
            <table class="table table-bordered table-striped">
                <thead class="">
                    <tr>
                        <th>Veiculo</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($veiculos as $veiculo)
                    <tr>
                        <td>{{$veiculo->tipo_veiculo}}</td>
                        <td><a href="/veiculo/{{$veiculo->id}}/edit"
                            class="btn btn-sm waves-effect waves-ligh  border border-secondary rounded"
                            style="color: rgb(121, 61, 22)">Editar</a></td>
                        <td>
                            <form action="/veiculo/{{$veiculo->id}}" method="POST">
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
