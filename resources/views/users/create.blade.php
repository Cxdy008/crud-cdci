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

</body>
</html>
