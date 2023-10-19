@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-12">
            <hr>
            <h2 class="intro-text text-center">Shift List</strong></h2>
            <hr>
        </div>

        <div class="row col col-3 mb-2" style="left: 41%">
            <form class="form-inline">

                <input name="fecha" class="form-control mr-sm-2" type="date" placeholder="Search by date"
                    aria-label="Search">

                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Filter</button>
            </form>
            <hr>
        </div>

        <div></div>
        <div class="row pt-2 col-12">
            <hr style="width: 100%">
            <table class="table table-bordered table-striped">
                <thead class="">
                    <tr>
                        <th>Identifier</th>
                        <th>Client</th>
                        <th>Vehicle Type</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Color</th>
                        <th>License Plate</th>
                        <th>Time</th>
                        <th>Wash Type</th>
                        <th>Price</th>
                        <th>Reception</th>
                        <th colspan="2" style="text-align: center;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($turnos as $turno)
                    <tr>
                        <td>{{$turno->identificador}}</td>
                        <td>{{$turno->client->user->name}}</td>
                        <td>{{$turno->vehicle_types->tipo_veiculo}}</td>
                        <td>{{$turno->marcas->tipo_marca}}</td>
                        <td>{{$turno->model_types->tipo_modelo}}</td>
                        <td>{{$turno->color}}</td>
                        <td>{{$turno->matricula}}</td>
                        <td>{{$turno->fecha_turno}}</td>
                        <td>{{$turno->wash_types->tipo_lavado}}</td>
                        <td>{{$turno->precio}}</td>
                        <td style="text-align: center">
                            @if ($turno->recepcionado)
                            Received
                            @else
                            Not Received
                            @endif
                        </td>
                        <td>
                            <a href="{{route('turno.edit',['turno'=>$turno->id])}}" class="btn btn-sm waves-effect waves-light border border-secondary rounded
                                @if ($turno->recepcionado) disabled @endif" style="color: rgb(121, 61, 22)">Edit</a>
                        </td>

                        <td>
                            <form action="{{route('turno.destroy',['turno'=>$turno->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" @if ($turno->recepcionado) disabled @endif
                                    class="btn btn-sm waves-effect waves-light border border-secondary rounded"
                                    style="color: rgb(61, 46, 85)"
                                    onclick="return confirm('Are you sure you want to delete this Shift?');">Cancel</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="row col col-12 justify-content-center">
            {{ $turnos->links() }}
        </div>

    </div>
</div>
@endsection
