<@extends('layouts.general')

@section('title', 'Task Edit')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header"><h4>Edit Task</h4></div>
            <div class="card-body">
                <a href="{{ route('tasks.index') }}" class="btn btn-info btn-sm mb-3">Back</a>

                <form action="{{ route('tasks.update', ['user' => $task->user->id, 'task' => $task->id]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="mt-2">
                        <label for="type">Type:</label>
                        <input type="text" name="type" id="type" value="{{ old('type', $task->type) }}" class="form-control">
                        @error('type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control">{{ old('description', $task->description) }}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <label for="user_id">Assign to User:</label>
                        <select name="user_id" id="user_id" class="form-control" required>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $task->user->id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
