<!DOCTYPE html>
<html>
<head>
    <style>
        /* Add your custom styling here for the PDF */
        body {
            font-family: Arial, sans-serif;
        }
        /* Add any additional styles for the PDF content */
    </style>
</head>
<body>
    <h1>Employee Profile</h1>
    <p><strong>Name:</strong> {{ $employee->name }}</p>
    <p><strong>Father Name:</strong> {{ $employee->father_name }}</p>
    <p><strong>CNIC:</strong> {{ $employee->cnic }}</p>
    <p><strong>Date of Birth:</strong> {{ $employee->dob }}</p>
    <p><strong>Address:</strong> {{ $employee->address }}</p>
    <p><strong>Contact Details:</strong> {{ $employee->contact_details }}</p>
    <p><strong>Experience Details:</strong> {{ $employee->experience_details }}</p>
    <p><strong>Status:</strong> {{ $employee->status ? 'Active' : 'Inactive' }}</p>
</body>
</html>
