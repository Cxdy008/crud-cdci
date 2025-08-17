@extends('layouts.general')

@section('title', 'Create Task')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header"><h4>Create Task</h4></div>
            <div class="card-body">
                <a href="{{ route('tasks.index') }}" class="btn btn-info btn-sm mb-3">Back</a>

                <form action="{{ route('tasks.create') }}" method="post" id="taskForm">
                    @csrf

                    <div class="mt-2">
                        <label for="type">Type:</label>
                        <input type="text" name="type" id="type" placeholder="Type" class="form-control">
                        @error('type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" placeholder="Description" class="form-control"></textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <label for="user_id">Assign to User:</label>
                        <select name="user_id" id="user_id" class="form-control" required>
                            <option value="">Select a User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <button class="btn btn-success btn-sm" type="submit" id="submitTask">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#taskForm').submit(function(e) {
                e.preventDefault();
                var userId = $('#user_id').val();
                if (userId) {
                    var formAction = "{{ route('tasks.store', ['user' => ':userId']) }}".replace(':userId', userId);
                    $(this).attr('action', formAction);
                    $(this).unbind('submit').submit();
                } else {
                    alert('Please select a user.');
                }
            });
        });
    </script>
@endsection
