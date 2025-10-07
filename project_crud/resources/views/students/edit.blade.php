@extends('layouts.app')

@section('title','Edit Student')


@section('content')
    <h3 class="text-primary">Edit Students</h3>
@endsection

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 offset-3">
            
            <div class="card bg-dark text-white mt-4">
                <div class="card-body border border-light rounded">
                    <form action="{{ route('students.update',$student->id) }}" method="POST" class="shadow-none">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control  text-light bg-dark shadow-none @error('name') is-invalid @enderror" value="{{old('name',$student->name)}}">
                            @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control text-light bg-dark shadow-none @error('email') is-invalid @enderror" value="{{old('email',$student->email)}}">
                            @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control text-light bg-dark shadow-none @error('phone') is-invalid @enderror" value="{{old('phone',$student->phone)}}" >
                            @error('phone')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <button class="btn btn-outline-warning text-white" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>