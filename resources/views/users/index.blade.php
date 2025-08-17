@extends('layouts.general')

@section('title', 'Users List')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header"><h4>User List</h4></div>
            <div class="card-body">
                @session("success")
                <div class="alert alert-success">{{ $value  }}</div>
                @endsession()

                <a href="{{ route('users.create') }}" class="btn btn-success btn-sm mb-3">Create User</a>


                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th width="30px">ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th width="280px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <div class="d-flex gap-2"> <!-- Usa flex com gap para espaçamento -->
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary btn-sm">View</a>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm">Edit</a>

                                    <!-- Form para Delete -->
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>

                                    <!-- Form para Purge -->
                                    <form action="{{ route('users.purge', $user->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm">Purge</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
