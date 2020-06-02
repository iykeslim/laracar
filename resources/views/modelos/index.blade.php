@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-12">
            <hr>
        <h2 class="intro-text text-center">Listado de Modelos</strong></h2>
            <hr>
        </div>

        <div><a href="{{route('modelo.create')}}" class="btn btn-sm waves-effect waves-ligh  border border-secondary rounded">Añadir Modelo</a></div>

        <div class="row pt-2 col-12">
            <hr style="width: 100%">
            <table class="table table-bordered table-striped">
                <thead class="">
                    <tr>
                        <th>Modelo</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($modelos as $modelo)
                    <tr>
                        <td>{{$modelo->tipo_modelo}}</td>
                        <td><a href="{{route('modelo.edit',['modelo'=>$modelo->id])}}"
                            class="btn btn-sm waves-effect waves-ligh  border border-secondary rounded"
                            style="color: rgb(121, 61, 22)">Editar</a></td>
                        <td>
                            <form action="{{route('modelo.destroy',['modelo'=>$modelo->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm waves-effect waves-ligh  border border-secondary rounded"
                            style="color: rgb(61, 46, 85)" onclick="return confirm('Está seguro de eliminar este modelo?');">Eliminar</button>
                            </td>
                        </form>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
    @endsection
