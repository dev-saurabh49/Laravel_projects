@extends('layouts.app')
@section('title', 'Student Details')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <div class="card bg-dark text-white">
                <div class="card-header d-flex justify-content-between align-items-center border-light">
                    <h4 class="mb-0">Student Details</h4>
                    <a href="{{ route('students.index') }}" class="btn btn-outline-light btn-sm">← Back to List</a>
                </div>

                <div class="card-body border border-light rounded">
                    <table class="table table-dark table-striped table-bordered text-center align-middle">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{$student->id}}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{$student->name}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$student->email}}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{$student->phone}}</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
