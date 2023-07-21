@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Employee Profile</h1>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Name:</strong> {{ $employee->name }}</p>
                <p><strong>Father Name:</strong> {{ $employee->father_name }}</p>
                <p><strong>CNIC:</strong> {{ $employee->cnic }}</p>
                <p><strong>Date of Birth:</strong> {{ $employee->dob }}</p>
                <p><strong>Address:</strong> {{ $employee->address }}</p>
                <p><strong>Contact Details:</strong> {{ $employee->contact_details }}</p>
                <p><strong>Experience Details:</strong> {{ $employee->experience_details ?: 'N/A' }}</p>
                <p><strong>Status:</strong> {{ $employee->status ? 'Active' : 'Inactive' }}</p>
            </div>
            <div class="col-md-6">
                @if ($employee->profile_picture)
                    <img src="{{ asset('storage/' . $employee->profile_picture) }}" alt="Profile Picture" class="img-thumbnail">
                @else
                    <p>No Profile Picture Uploaded</p>
                @endif
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edit Employee</a>
            <form action="{{ route('employees.destroy', $employee->id) }}" method="post" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete Employee</button>
            </form>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
@endsection
