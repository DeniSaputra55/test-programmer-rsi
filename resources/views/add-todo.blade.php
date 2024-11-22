<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">Add new todo</div>
            @if (Session::has('fail'))
            <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
            @endif
            <div class="card-body">
                <form action="{{route('AddTodo')}}" method="post">
                @csrf
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Todo</label>
                        <input type="text" name="todo" value="" class="form-control" id="formGroupExampleInput" placeholder="Enter Todo">
                        @error('todo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" value="" class="form-control" id="formGroupExampleInput2" placeholder="Enter Tanggal">
                        @error('tanggal')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Jam</label>
                        <input type="time" name="jam" value="" class="form-control" id="formGroupExampleInput2" placeholder="Enter Jam">
                        @error('jam')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="statusSelect" class="form-label fw-bold text-primary">Status</label>
                        <select class="form-select" id="statusSelect" name="status">
                            <option selected disabled>Pilih Status</option>
                            <option value="belum">Belum</option>
                            <option value="sedang">Sedang</option>
                            <option value="sudah">Sudah</option>
                        </select>
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
<!-- <script>
    const jamInput = document.getElementById("formGroupExampleInput3");

    jamInput.addEventListener("input", function () {
        const value = parseInt(jamInput.value);
        if (value < 0 || value > 23) {
            jamInput.setCustomValidity("Jam harus antara 0 hingga 23.");
        } else {
            jamInput.setCustomValidity("");
        }
    });
</script> -->
</html>