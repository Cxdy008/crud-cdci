@extends('layouts.general')

@section('title', 'List Tasks')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header"><h4>Tasks List</h4></div>
            <div class="card-body">
                @session("success")
                <div class="alert alert-success">{{ $value  }}</div>
                @endsession()

                <a href="{{ route('tasks.create') }}" class="btn btn-success btn-sm mb-3">Create Task</a>
                @if ($tasks->isEmpty())
                    <p>Nenhuma tarefa encontrada</p>
                @else
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th width="30px">ID</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Assigned User</th>
                            <th width="280px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->id}}</td>
                                <td>{{$task->type}}</td>
                                <td>{{$task->description}}</td>
                                <td>{{$task->user->name ?? 'No User'}}</td>
                                <td>
                                    <div class="d-flex gap-2"> <!-- Usa flex com gap para espaçamento -->
                                        <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-primary btn-sm">View</a>
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-info btn-sm">Edit</a>

                                        <!-- Form para Delete -->
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>

                                        <!-- Form para Purge -->
                                        <form action="{{ route('tasks.purge', $task  ->id) }}" method="POST" class="d-inline-block">
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
                @endif
            </div>
        </div>
    </div>
@endsection
