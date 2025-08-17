@extends('layouts.general')

@section('title', 'Show Task')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header"><h4>User Show</h4></div>
            <div class="card-body">
                <a href="{{ route('tasks.index') }}" class="btn btn-info btn-sm mb-3">Back</a>

                <div class="mt-4">
                    <p><strong>Type:</strong> {{$task->type}}</p>
                    <p><strong>Description:</strong> {{$task->description}}</p>
                    <p><strong>Assigned User:</strong> {{$task->user->name ?? 'No User'}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
