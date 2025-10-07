{{-- <h1>All users data </h1>

@foreach ($data as $id => $user)
<h3>
    {{ $user->name }} |
    {{ $user->email }} |
    {{ $user->age }} |
    {{ $user->city }} |
</h3>
    
@endforeach --}}

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>All users List</h1>
                <a href="/newuser" class="btn btn-success btn-sm mb-4">Add New</a>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>AGE</th>
                        <th>CITY</th>
                        <th>VIEW</th>
                        <th>DELETE</th>
                        <th>EDIT</th>
                    </tr>
                    @foreach ($data as $id => $user)
                    
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->age }}</td>
                        <td>{{ $user->city }}</td>
                        <td><a href="{{ route('view.user' , $user->id) }}" class="btn btn-primary btn-sm">view</a></td>
                        <td><a href="{{ route('delete.user' , $user->id) }}" class="btn btn-danger btn-sm">delete</a></td>
                        <td><a href="{{ route('update.page' , $user->id) }}" class="btn btn-warning btn-sm">update</a></td>

                    </tr>
                    @endforeach
                </table>
                <div class="mt-3">
                    {{ $data->links('pagination::bootstrap-5') }}
                </div>
            </div>
            <div>
                Total Users : {{ $data->total() }} <br>
                Current Page : {{ $data->currentPage() }}
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>