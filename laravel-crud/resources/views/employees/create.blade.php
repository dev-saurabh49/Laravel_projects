<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
</head>
<body>

<h2>Add Employee</h2>

<form method="POST" action="{{ route('employees.store') }}">
    @csrf
    <label>Name:</label>
    <input type="text" name="name" required><br><br>

    <label>Email:</label>
    <input type="email" name="email" required><br><br>

    <label>City:</label>
    <input type="text" name="city" required><br><br>

    <label>Phone:</label>
    <input type="text" name="phone" required><br><br>

    <button type="submit">Save</button>
</form>


<a href="{{ route('employees.index') }}">Back</a>

</body>
</html>
