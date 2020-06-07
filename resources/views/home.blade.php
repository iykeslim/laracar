@extends('layouts.app')

@section('content')
<div class="container background-rojo">
    <div class="row justify-content-center">
        <div class="col col-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="justify-between-content">
                        <a href="{{route('systemUser.index')}}" class="btn btn-lg btn-orange">Listado de Usuarios</a>
                        <a href="{{route('client.index')}}" class="btn btn-lg btn-orange">Listado de Clientes</a>
                        <a href="{{route('turno.index')}}" class="btn btn-lg btn-orange">Listado de Turnos</a>
                        <a href="{{route('marca.index')}}" class="btn btn-lg btn-orange">Listado de Marcas</a>
                        <a href="{{route('modelo.index')}}" class="btn btn-lg btn-orange">Listado de Modelos</a>
                        <a href="{{route('vehicleType.index')}}" class="btn btn-lg btn-orange">Listado de Veiculos</a>
                        <a href="{{route('washType.index')}}" class="btn btn-lg btn-orange">Listado de Lavados</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
