@extends('layouts.app')
@section('title','Students-List')


@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">

            <div class="card bg-dark text-white">
                <div class="card-header d-flex justify-content-between align-items-center border-light">
                    <h4 class="mb-0">All Students</h4>
                    <a href="{{ route('students.create') }}" class="btn btn-outline-success btn-sm text-white">
                        + Add New
                    </a>
                </div>
                @session('success')
            <div class="alert alert-success alert-dismissible fade show shadow-none" role="alert">
                <strong>Success!</strong> {{$value}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endsession

                <div class="card-body border border-light rounded">
                    @if ($students->count() > 0)
                        <table class="table table-dark table-hover table-bordered align-middle text-center">
                            <thead>
                                <tr class="text-success">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $student)
                                    <tr>
                                        <td>{{$student->id}}</td>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->email}}</td>
                                        <td>{{$student->phone}}</td>
                                        <td>
                                            <a href="{{route('students.show',$student->id)}}" class="btn btn-sm btn-outline-info">View</a>
                                            <a href="{{route('students.edit',$student->id)}}" class="btn btn-sm btn-outline-warning">Edit</a>
                                            <form action="{{route('students.destroy',$student->id)}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <!-- Delete Button -->
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$student->id}}">
                                            Delete
                                            </button>

                                            </form>
                                            <!-- Delete Confirmation Modal -->
                                        <div class="modal fade" id="deleteModal{{$student->id}}" tabindex="-1" aria-labelledby="deleteModalLabel{{$student->id}}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content shadow-lg border-0">
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title" id="deleteModalLabel{{$student->id}}">Confirm Deletion</h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <p class="fs-6 mb-0 text-secondary">Are you sure you want to delete <strong>{{$student->name}}</strong>? This action cannot be undone.</p>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                        </div>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No Student Found</td>
                                    </tr>
                                @endforelse
                                
                            </tbody>
                        </table>
                        {{$students->links()}}
                    @else
                        <p class="text-center text-secondary">No students found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
