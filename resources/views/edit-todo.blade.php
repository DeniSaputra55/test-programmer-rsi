<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New todo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">Edit todo</div>
            @if (Session::has('fail'))
            <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
            @endif
            <div class="card-body">
                <form action="{{ route('Edittodo')}}" method="post">
                    @csrf
                    <input type="hidden" name="todo" id="" value="{{$todo->id}}">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Full Name</label>
                        <input type="text" name="todo" value="{{$todo->name}}" class="form-control" id="formGroupExampleInput" placeholder="Enter Full Name">
                        @error('todo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="{{$todo->tanggal}}" id="formGroupExampleInput2" placeholder="Enter tanggal">
                        @error('tanggal')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">jam</label>
                        <input type="number" name="jam" value="{{$todo->jam}}" class="form-control" id="formGroupExampleInput2" placeholder="Enter jam">
                        @error('jam')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">jam</label>
                        <input type="string" name="status" value="{{$todo->status}}" class="form-control" id="formGroupExampleInput2" placeholder="Enter status">
                        @error('status')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>

                </form>

            </div>
        </div>
    </div>
</body>

</html>