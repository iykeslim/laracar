@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-12">
            <hr>
            <h2 class="intro-text text-center">Customer details <strong>{{$client->user->name}}</strong></h2>
            <hr>
        </div>

        <div class="row pt-2 col col-12">

            <dl class="row offset-3">
                <dt class="col-sm-3">Name:</dt>
                <dd class="col-sm-9">{{$client->user->name}} {{$client->user->lastname}}.</dd>

                <dt class="col-sm-3">Driver's License Number:</dt>
                <dd class="col-sm-9">{{$client->user->dni}}</dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{$client->user->email}}</dd>

                <dt class="col-sm-3 text-truncate">Phone Number</dt>
                <dd class="col-sm-9">{{$client->user->client->telefono}}</dd>

                <dt class="col-sm-3">Address</dt>
                <dd class="col-sm-9">{{$client->user->client->direccion}}</dd>

                <dt class="col-3">Actions:</dt>
                <dd class="col-9 d-flex align-items-baseline">
                    <a href="{{route('client.edit',['client'=>$client->id])}}"
                        class="mr-5 btn btn-md waves-effect waves-ligh  border border-secondary rounded"
                        style="color: rgb(61, 46, 85)">Edit Profile</a>
                    <form action="{{route('turno.create')}}" method="GET">
                        @csrf
                        <input type="hidden" name="client_id" value="{{$client->id}}">
                        <button type="submit"
                            class="btn btn-md waves-effect waves-ligh  border border-secondary rounded"
                            style="color: rgb(82, 38, 38)">Book A Turn</button>
                    </form>
                </dd>
            </dl>

        </div>
        <div class="row pt-2 col-12">
            <hr style="width: 100%">
            <table class="table table-bordered table-striped">
                <thead class="">
                    <tr>
                        <th>ID</th>
                        <th>Types</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Color</th>
                        <th>Registration Number</th>
                        <th>Date</th>
                        <th>Wash</th>
                        <th>Price</th>
                        <th>Edit</th>
                        <th>Cancel</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($turnos as $turno)
                    <tr>
                        <td>{{$turno->identificador}}</td>
                        <td>{{$turno->vehicle_types->tipo_veiculo}}</td>
                        <td>{{$turno->marcas->tipo_marca}}</td>
                        <td>{{$turno->model_types->tipo_modelo}}</td>
                        <td>{{$turno->color}}</td>
                        <td>{{$turno->matricula}}</td>
                        <td>{{$turno->fecha_turno}}</td>
                        <td>{{$turno->wash_types->tipo_lavado}}</td>
                        <td>{{$turno->precio}}</td>
                        <td>

                            <a href="{{route('turno.edit',['turno'=>$turno->id])}}" class="btn btn-sm waves-effect waves-ligh  border border-secondary rounded
                                @if ($turno->recepcionado) disabled @endif" style="color: rgb(121, 61, 22)">Edit</a>

                        </td>
                        <td>

                            <form action="{{route('turno.destroy',['turno'=>$turno->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" @if ($turno->recepcionado) disabled @endif
                                    class="btn btn-sm waves-effect waves-ligh border border-secondary rounded"
                                    style="color: rgb(61, 46, 85)" onclick="return confirm('Are you sure you want to delete this?');">Cancel</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
    @endsection
