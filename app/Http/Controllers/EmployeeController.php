<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Exports\EmployeesExport;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'cnic' => 'required|string|max:15|unique:employees',
            'dob' => 'required|date',
            'address' => 'required|string',
            'contact_details' => 'required|string',
            'experience_details' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean',
        ]);

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        } else {
            $profilePicturePath = null;
        }

        Employee::create([
            'name' => $request->input('name'),
            'father_name' => $request->input('father_name'),
            'cnic' => $request->input('cnic'),
            'dob' => $request->input('dob'),
            'address' => $request->input('address'),
            'contact_details' => $request->input('contact_details'),
            'experience_details' => $request->input('experience_details'),
            'profile_picture' => $profilePicturePath,
            'status' => $request->input('status'),
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee added successfully.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'cnic' => 'required|string|max:15|unique:employees,cnic,' . $employee->id,
            'dob' => 'required|date',
            'address' => 'required|string',
            'contact_details' => 'required|string',
            'experience_details' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean',
        ]);

        // Handle profile picture update
        if ($request->hasFile('profile_picture')) {
            // Delete the old profile picture if exists
            if ($employee->profile_picture) {
                \Storage::disk('public')->delete($employee->profile_picture);
            }

            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        } else {
            $profilePicturePath = $employee->profile_picture;
        }

        $employee->update([
            'name' => $request->input('name'),
            'father_name' => $request->input('father_name'),
            'cnic' => $request->input('cnic'),
            'dob' => $request->input('dob'),
            'address' => $request->input('address'),
            'contact_details' => $request->input('contact_details'),
            'experience_details' => $request->input('experience_details'),
            'profile_picture' => $profilePicturePath,
            'status' => $request->input('status'),
        ]);

        return redirect()->route('employees.show', $employee->id)->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        // Delete the profile picture if exists
        if ($employee->profile_picture) {
            \Storage::disk('public')->delete($employee->profile_picture);
        }

        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }

    public function exportExcel()
    {
        return \Excel::download(new EmployeesExport(), 'employees.xlsx');
    }

    public function showProfile(Employee $employee)
    {
        return view('employees.profile', compact('employee'));
    }

    public function exportProfilePDF(Employee $employee)
    {
        $pdf = \PDF::loadView('employees.pdf', compact('employee'));
        return $pdf->download('employee_profile.pdf');
    }
}
