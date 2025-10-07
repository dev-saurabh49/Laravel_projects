<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Employee</title>
</head>
<body>
    <h2>Edit Page of employees</h2>

    <form method="POST" action="{{ route('employees.update',$employees->id) }}">
    @csrf
    <label>Name:</label>
    <input type="text" name="name" value="{{ $employees->name }}" required><br><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ $employees->email }}" required><br><br>

    <label>City:</label>
    <input type="text" name="city" value="{{ $employees->city }}" required><br><br>

    <label>Phone:</label>
    <input type="text" name="phone" value="{{ $employees->phone }}" required><br><br>

    <button type="submit">Update</button>
</form>
</body>
</html>