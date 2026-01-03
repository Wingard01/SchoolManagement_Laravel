@extends('layouts.app')

@section('title', 'Students List')
@section('page-title', 'Students Management')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">Students</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Students</h3>
                <div class="card-tools">
                    <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle me-1"></i>Add New Student
                    </a>
                </div>
            </div>
            
            <div class="card-body p-0">
                @if($students->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th style="width: 50px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Course</th>
                                    <th>Phone</th>
                                    <th style="width: 150px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $index => $student)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <i class="bi bi-person-circle me-2 text-primary"></i>
                                            {{ $student->name }}
                                        </td>
                                        <td>
                                            <i class="bi bi-envelope me-2 text-muted"></i>
                                            {{ $student->email }}
                                        </td>
                                        <td>
                                            <i class="bi bi-book me-2 text-success"></i>
                                            {{ $student->course }}
                                        </td>
                                        <td>
                                            <i class="bi bi-telephone me-2 text-info"></i>
                                            {{ $student->phone }}
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('students.edit', $student) }}" 
                                                   class="btn btn-warning btn-sm" 
                                                   title="Edit">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <form action="{{ route('students.destroy', $student) }}" 
                                                      method="POST" 
                                                      class="d-inline"
                                                      onsubmit="return confirm('Are you sure you want to delete this student?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-danger btn-sm" 
                                                            title="Delete">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="bi bi-inbox display-1 text-muted"></i>
                        <p class="mt-3 text-muted">No students found. Add your first student!</p>
                        <a href="{{ route('students.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-1"></i>Add Student
                        </a>
                    </div>
                @endif
            </div>

            @if($students->count() > 0)
                <div class="card-footer clearfix">
                    <div class="float-start">
                        Showing {{ $students->count() }} student(s)
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection