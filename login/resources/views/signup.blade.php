<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #74ebd5 0%, #9face6 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Poppins', sans-serif;
    }
    .card {
      border: none;
      border-radius: 1rem;
      box-shadow: 0 5px 25px rgba(0, 0, 0, 0.15);
    }
    .form-control:focus {
      border-color: #6f42c1;
      box-shadow: 0 0 0 0.2rem rgba(111, 66, 193, 0.25);
    }
    .btn-custom {
      background-color: #6f42c1;
      color: #fff;
      transition: 0.3s;
    }
    .btn-custom:hover {
      background-color: #5a32a3;
      color: #fff;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card p-4">
          <div class="card-body">
            <h3 class="text-center mb-4 text-primary fw-bold">Create Account</h3>

            <form action="{{ route('signupcode') }}" method="POST">
              @csrf
              
              <!-- Name -->
              <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
              </div>

              <!-- Email -->
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" required>
              </div>

              <!-- Password -->
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
              </div>

              <!-- Confirm Password -->
              {{-- <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="password_confirmation" placeholder="••••••••" required>
              </div> --}}

              <!-- Terms -->
              {{-- <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="terms" required>
                <label class="form-check-label" for="terms">
                  I agree to the <a href="#" class="text-decoration-none text-primary">Terms & Conditions</a>
                </label>
              </div> --}}

              <!-- Submit -->
              <div class="d-grid">
                <button type="submit" class="btn btn-custom">Sign Up</button>
              </div>
            </form>

            <div class="text-center mt-3">
              <small>Already have an account? <a href="{{ route('login') }}" class="text-primary fw-semibold text-decoration-none">Login here</a></small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
