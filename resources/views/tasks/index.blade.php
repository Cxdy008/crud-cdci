<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

</head>
<body>
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
                        <th width="280px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{$task->id}}</td>
                            <td>{{$task->type}}</td>
                            <td>{{$task->description}}</td>
                            <td>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>

</body>
</html>
