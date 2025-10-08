<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-2">File Upload</h2>

            </div>
        </div>
        <form action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-3">
                    <img src="{{ asset('/storage/'.$user->file) }}" class="img-fluid img-responsive" id="output" alt="">

                </div>
                <div class="col-9">
                <input type="file" onchange="document.querySelector('#output').src=window.URL.createObjectURL(this.files[0])" name="photo" accept="image/*">
                @error('photo')
                    <div class="alert alert-danger mb-1 mt-1">{{$message}}</div>
                @enderror
            </div>

            <div class="col-12">
                <button type="submit" value="update" class="btn btn-warning btn-sm">Update</button>
            </div>
            </div>
        </form>
        <div class="row">
    <div class="col-6">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
</div>

        {{-- <div class="row">
            
                @foreach ($users as $user)
                    <div class="col-2">
                        <img class="img-fluid img-thumbnail" src="{{ asset('/storage/'.$user->file) }}" alt="">
                        <form action="{{route('user.destroy',$user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-sm btn btn-danger mb-3">Delete</button>
                        </form>
                        <a class="btn btn-warning mb-3 ms-3">Update</a>
                    </div>
                @endforeach
            
        </div> --}}
    </div>
</body>
</html>