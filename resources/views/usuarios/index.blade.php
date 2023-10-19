@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-12">
        <hr>
<h2 class="intro-text text-center">List of Users</h2>
<hr>
</div>
<div><a href="{{route('systemUser.create')}}" class="btn btn-sm waves-effect waves-light  border border-secondary rounded">Add User</a></div>

        <div class="row pt-2 col-12">
            <hr style="width: 100%">
            <table class="table table-bordered table-striped">
                <thead class="">
                    <tr>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>Driver's License Number</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Details</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($systemUsers as $systemUser)
                    <tr>
                        <td>{{$systemUser->user->name ?? 'lala'}}</td>
                        <td>{{$systemUser->user->lastname ?? 'lala'}}</td>
                        <td>{{$systemUser->user->dni ?? 'lala'}}</td>
                        <td>{{$systemUser->user->email ?? 'lala'}}</td>
                        <td>{{$systemUser->role ?? 'lala'}}</td>
                        <td><a href="{{route('systemUser.show',['systemUser'=>$systemUser->id])}}"
                            class="btn btn-sm waves-effect waves-ligh  border border-secondary rounded"
                            style="color: rgb(121, 61, 22)">Detail</a></td>
                        <td>
                            <form action="{{route('systemUser.destroy',['systemUser'=>$systemUser->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm waves-effect waves-ligh  border border-secondary rounded"
                            style="color: rgb(61, 46, 85)"  onclick="return confirm('Está seguro de eliminar esta Usuario?');">Delete</button>
                            </td>
                        </form>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
    @endsection
