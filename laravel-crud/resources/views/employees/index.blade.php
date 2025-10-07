<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employees</title>
</head>
<body>
    <h2>Employees List</h2>
    <a href="{{ route('employees.create') }}">Add New Employee</a>

    @if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>CITY</th>
            <th>PHONE</th>
            <th>CREATED_AT</th>
            <th>UPDATED_AT</th>
            <th>ACTION</th>
        </tr>
        @foreach ($employees as $emp)
        
        <tr>   
            <td>{{ $emp->id }}</td>
            <td>{{ $emp->name }}</td>
            <td>{{ $emp->email }}</td>
            <td>{{ $emp->city }}</td>
            <td>{{ $emp->phone }}</td>
            <td>{{ $emp->created_at }}</td>
            <td>{{ $emp->updated_at }}</td>
            <td>
                <a href="{{ route('employees.edit' , $emp->id) }}">Edit</a> |
                <a href="{{ route('employees.destroy',$emp->id) }}">Delete</a>
            </td>
        </tr>
        @endforeach

    </table>
</body>
</html>