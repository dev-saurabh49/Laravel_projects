<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add User</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
<body>
    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg rounded-4 border-0">
                <div class="card-body">
                    <h2 class="text-center mb-4 text-primary">Add New User</h2>

                    <form action="{{route('addUser')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter full name" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter email address" required>
                        </div>

                        <div class="mb-3">
                            <label for="age" class="form-label fw-semibold">Age</label>
                            <input type="number" name="age" id="age" class="form-control" placeholder="Enter age" required>
                        </div>

                        <div class="mb-3">
                            <label for="city" class="form-label fw-semibold">City</label>
                            <input type="text" name="city" id="city" class="form-control" placeholder="Enter city name" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mt-3 rounded-pill">
                            <i class="bi bi-person-plus"></i> Add User
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>