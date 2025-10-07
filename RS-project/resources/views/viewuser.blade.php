@extends('layout')

@section('title')
    View User
@endsection

@section('content')
<div class="card shadow-sm mt-5 ">
        <div class="card-header bg-primary text-white" style="font-size:1.1rem;">
            Particular Data Details
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0 align-middle">
                <tbody style="font-size:1.05rem;">
                    <tr>
                        <th style="width:220px;">Name</th>
                        <td>{{$students->name}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$students->email}}</td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td>{{$students->age}}</td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td>{{$students->city}}</td>
                    </tr>
     
                </tbody>
            </table>

            
        </div>
        
    </div>
    <a href="{{route('student.index')}}" class="btn btn-danger mt-3">Back</a>
@endsection