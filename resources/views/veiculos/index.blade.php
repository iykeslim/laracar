@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-12">
            <hr>
            <h2 class="intro-text text-center">List of Vehicles</strong></h2>
            <hr>
        </div>

        <div><a href="{{ route('vehicleType.create') }}" class="btn btn-sm waves-effect waves-ligh  border border-secondary rounded">Add Vehicle</a></div>

        <div class="row pt-2 col-12">
            <hr style="width: 100%">
            <table class="table table-bordered table-striped">
                <thead class="">
                    <tr>
                        <th></th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vehicleTypes as $vehicleType)
                    <tr>
                        <td>{{$vehicleType->tipo_veiculo}}</td>
                        <td><a href="{{route('vehicleType.edit',['vehicleType'=>$vehicleType->id])}}"
                            class="btn btn-sm waves-effect waves-ligh  border border-secondary rounded"
                            style="color: rgb(121, 61, 22)">Edit</a></td>
                        <td>
                            <form action="{{route('vehicleType.destroy',['vehicleType'=>$vehicleType->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm waves-effect waves-ligh  border border-secondary rounded"
                            style="color: rgb(61, 46, 85)" onclick="return confirm('Are you sure you want to delete this Vehicle?');">Delete</button>
                            </td>
                        </form>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
