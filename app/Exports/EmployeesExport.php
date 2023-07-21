<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Employee::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Father Name',
            'CNIC',
            'Date of Birth',
            'Address',
            'Contact Details',
            'Experience Details',
            'Status',
        ];
    }
}

