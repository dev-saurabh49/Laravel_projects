@extends('layout')

@section('title')
    All users Data
@endsection

@section('content')
<a href="{{route('student.create')}}" class="btn btn-success btn-sm mb-4">Add New</a>
        <table class="table table-striped table-bordered">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>AGE</th>
                <th>CITY</th>
                <th>VIEW</th>
                <th>UPDATE</th>
                <th>DELETE</th>
            </tr>
            @foreach ($students as $student)
                <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->age}}</td>
                    <td>{{$student->city}}</td>
                    <td><a href="{{route('student.show',$student->id)}}" class="btn btn-info btn-sm">VIEW</a></td>
                    <td><a href="{{route('student.edit',$student->id)}}" class="btn btn-warning btn-sm">UPDATE</a></td>
                    <td>
                        <form action="{{route('student.destroy',$student->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="mt-4">
            {{ $students->links() }}
        </div>
    
@endsection