@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Employee Profile</h5>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> {{ $employee->name }}</p>
                        <p><strong>Father Name:</strong> {{ $employee->father_name }}</p>
                        <p><strong>CNIC:</strong> {{ $employee->cnic }}</p>
                        <p><strong>Date of Birth:</strong> {{ $employee->dob }}</p>
                        <p><strong>Address:</strong> {{ $employee->address }}</p>
                        <p><strong>Contact Details:</strong> {{ $employee->contact_details }}</p>
                        <p><strong>Experience Details:</strong> {{ $employee->experience_details }}</p>
                        <p><strong>Status:</strong> {{ $employee->status ? 'Active' : 'Inactive' }}</p>
                    </div>
                    <div class="col-md-6">
                        <!-- Add any additional information or profile picture here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
