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
        <div class="card-header"><h4>User Show</h4></div>
        <div class="card-body">
            <a href="{{ route('users.index') }}" class="btn btn-info btn-sm mb-3">Back</a>
            <a href="{{ route('tasks.index') }}" class="btn btn-primary btn-sm mb-3">Tasks</a>

            <div class="mt-4">
                <p><strong>Name:</strong> {{$user->name}}</p>
                <p><strong>Email:</strong> {{$user->email}}</p>
                <p><strong>Password:</strong> {{$user->password}}</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
