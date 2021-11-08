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
                        <a href="{{route('systemUser.index')}}" class="btn btn-lg btn-orange">List of Users</a>
                        <a href="{{route('client.index')}}" class="btn btn-lg btn-orange">List of Clients</a>
                        <a href="{{route('turno.index')}}" class="btn btn-lg btn-orange">List of Shifts</a>
                        <a href="{{route('marca.index')}}" class="btn btn-lg btn-orange">List of Brands</a>
                        <a href="{{route('modelo.index')}}" class="btn btn-lg btn-orange">List of Models</a>
                        <a href="{{route('vehicleType.index')}}" class="btn btn-lg btn-orange">List of Vehicles</a>
                        <a href="{{route('washType.index')}}" class="btn btn-lg btn-orange">List of Car Washes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
