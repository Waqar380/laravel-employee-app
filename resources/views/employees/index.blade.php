@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Employee List</h1>
        <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Add Employee</a>
        <a href="{{ route('employees.export.excel') }}" class="btn btn-success mb-3">Export to Excel</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>CNIC</th>
                    <th>Date of Birth</th>
                    <th>Address</th>
                    <th>Contact Details</th>
                    <th>Experience Details</th>
                    <th>Profile Picture</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->father_name }}</td>
                    <td>{{ $employee->cnic }}</td>
                    <td>{{ $employee->dob }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->contact_details }}</td>
                    <td>{{ $employee->experience_details }}</td>
                    <td>
                        @if ($employee->profile_picture)
                            <img src="{{ asset('storage/' . $employee->profile_picture) }}" alt="Profile Picture" width="50">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $employee->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{ route('employees.export.pdf', $employee) }}" class="btn btn-success btn-sm">Export to PDF</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
