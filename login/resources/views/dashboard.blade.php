<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | MyApp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Login</a>
      <div class="d-flex">
        <a href="{{route('logout')}}" class="btn btn-outline-light btn-sm">Logout</a>
        <a href="{{route('changepassword')}}" class="btn btn-outline-light btn-sm ms-2">change password</a>
      </div>
    </div>
  </nav>

  <div class="container mt-5">
    <h3> Welcome, {{ $data->name ?? session('user') }} </h3>
    <p class="text-muted">Here’s your overview for today.</p>

    <div class="row mt-4 g-3">
      <div class="col-md-4">
        <div class="card shadow-sm p-3">
          <h5>Total Bookings</h5>
          <h3 class="text-primary">45</h3>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow-sm p-3">
          <h5>Pending Tasks</h5>
          <h3 class="text-warning">8</h3>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow-sm p-3">
          <h5>Messages</h5>
          <h3 class="text-success">12</h3>
        </div>
      </div>
    </div>
  </div>

  {{-- just code  --}}

</body>
</html>
