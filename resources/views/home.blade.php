@extends('layouts.app')

@section('content')
<div class="container">
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
                        <a href="/cliente" class="btn btn-lg btn-orange">Listado de Clientes</a>
                        <a href="/usuario" class="btn btn-lg btn-orange">Listado de Usuarios</a>
                        <a href="/marca" class="btn btn-lg btn-orange">Listado de Marcas</a>
                        <a href="/modelo" class="btn btn-lg btn-orange">Listado de Modelos</a>
                        <a href="/veiculo" class="btn btn-lg btn-orange">Listado de Veiculos</a>
                        <a href="/lavado" class="btn btn-lg btn-orange">Listado de Lavados</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
