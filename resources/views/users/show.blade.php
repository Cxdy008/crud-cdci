@extends('layouts.general')

@section('title', 'Show User')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header"><h4>User Show</h4></div>
            <div class="card-body">
                <a href="{{ route('users.index') }}" class="btn btn-info btn-sm mb-3">Back</a>

                <div class="mt-4">
                    <p><strong>Name:</strong> {{$user->name}}</p>
                    <p><strong>Email:</strong> {{$user->email}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
