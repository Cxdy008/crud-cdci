@extends('layouts.general')

@section('title', 'Create User')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header"><h4>User Create</h4></div>
            <div class="card-body">
                <a href="{{ route('users.index') }}" class="btn btn-info btn-sm mb-3">Back</a>

                <form action="{{ route('users.store') }}" method="post">
                    @csrf

                    <div classe="mt-2 ">
                        <label for="">Name:</label>
                        <input type="text" name="name" placeholder="Name" class="form-control">
                        @error("name")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div classe="mt-2">
                        <label for="">Email:</label>
                        <input type="text" name="email" placeholder="Email" class="form-control">
                        @error("detail")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div classe="mt-2">
                        <label for="">Password:</label>
                        <input type="text" name="password" placeholder="Password" class="form-control">
                        @error("detail")
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
