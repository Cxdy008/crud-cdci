@extends('layouts.general')

@section('title', 'User Edit')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header"><h4>User Edit</h4></div>
            <div class="card-body">
                <a href="{{ route('users.index') }}" class="btn btn-info btn-sm mb-3">Back</a>

                <form action="{{ route('users.update', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div classe="mt-2 ">
                        <label for="">Name:</label>
                        <input type="text" name="name" placeholder="Name" class="form-control" value="{{$user->name}}">
                        @error("name")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div classe="mt-2 ">
                        <label for="">Name:</label>
                        <input type="text" name="email" placeholder="Email" class="form-control" value="{{$user->email}}">
                        @error("name")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div classe="mt-2 ">
                        <label for="">Name:</label>
                        <input type="text" name="password" placeholder="Password" class="form-control" value="{{$user->password}}">
                        @error("name")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div classe="mt-2">
                        <button class="btn btn-success btn-sm" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
