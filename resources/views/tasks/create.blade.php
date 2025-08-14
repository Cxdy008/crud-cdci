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
        <div class="card-header"><h4>Task Create</h4></div>
        <div class="card-body">
            <a href="{{ route('tasks.index') }}" class="btn btn-info btn-sm mb-3">Back</a>

            <form action="{{ route('tasks.store', $user) }}" method="post">
                @csrf

                <div class="mt-2 ">
                    <label for="">Type:</label>
                    <input type="text" name="type" placeholder="Type" class="form-control">
                    @error("type")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-2">
                    <label for="">Description:</label>
                    <textarea name="description" placeholder="Description" class="form-control"> </textarea>
                    @error("description")
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
