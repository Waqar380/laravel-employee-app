@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Dashboard Statistics</h5>
                <p class="card-text">Total Employees: <span class="badge bg-secondary">{{ $totalEmployees }}</span></p>
                <p class="card-text">Active Employees: <span class="badge bg-success">{{ $activeEmployees }}</span></p>
                <!-- Add any additional dashboard statistics here -->
                <a href="{{ route('employees.index') }}" class="btn btn-primary">View Employee's List</a>
            </div>
        </div>
    </div>
</div>

    </div>
@endsection
