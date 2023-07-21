@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Employee</h1>
        <form action="{{ route('employees.update', $employee->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" required>
            </div>
            <div class="mb-3">
                <label for="father_name" class="form-label">Father Name</label>
                <input type="text" class="form-control" id="father_name" name="father_name" value="{{ $employee->father_name }}" required>
            </div>
            <div class="mb-3">
                <label for="cnic" class="form-label">CNIC</label>
                <input type="text" class="form-control" id="cnic" name="cnic" value="{{ $employee->cnic }}" required>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" value="{{ $employee->dob }}" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required>{{ $employee->address }}</textarea>
            </div>
            <div class="mb-3">
                <label for="contact_details" class="form-label">Contact Details</label>
                <input type="text" class="form-control" id="contact_details" name="contact_details" value="{{ $employee->contact_details }}" required>
            </div>
            <div class="mb-3">
                <label for="experience_details" class="form-label">Experience Details</label>
                <textarea class="form-control" id="experience_details" name="experience_details" rows="3">{{ $employee->experience_details }}</textarea>
            </div>
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Profile Picture</label>
                @if ($employee->profile_picture)
                    <p>Current Profile Picture:</p>
                    <img src="{{ asset('storage/' . $employee->profile_picture) }}" alt="Profile Picture" width="100">
                @else
                    <p>No Profile Picture Uploaded</p>
                @endif
                <input type="file" class="form-control" id="profile_picture" name="profile_picture">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="1" {{ $employee->status ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$employee->status ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Employee</button>
        </form>
    </div>
@endsection
