@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-12">
            <hr>
            <h2 class="intro-text text-center">Wash Type List</strong></h2>
            <hr>
        </div>

        <div><a href="{{ route('washType.create') }}" class="btn btn-sm waves-effect waves-light border border-secondary rounded">Add Wash Type</a></div>

        <div class="row pt-2 col-12">
            <hr style="width: 100%">
            <table class="table table-bordered table-striped">
                <thead class="">
                    <tr>
                        <th>Wash Type</th>
                        <th>Price</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($washTypes as $washType)
                    <tr>
                        <td>{{$washType->tipo_lavado}}</td>
                        <td>{{$washType->precio}}</td>
                        <td><a href="{{ route('washType.edit', ['washType' => $washType->id]) }}"
                            class="btn btn-sm waves-effect waves-light border border-secondary rounded"
                            style="color: rgb(121, 61, 22)">Edit</a></td>
                        <td>
                            <form action="{{ route('washType.destroy', ['washType' => $washType->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm waves-effect waves-light border border-secondary rounded"
                            style="color: rgb(61, 46, 85)"  onclick="return confirm('Are you sure you want to delete this Wash Type?');">Delete</button>
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
