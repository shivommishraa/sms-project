<?php

namespace App\Exports;

use App\Models\Teacher\Teacher;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TeachersExport implements
    FromCollection,
    WithHeadings
{
    public function collection()
    {
        return Teacher::with([
            'department',
            'designation'
        ])
        ->get()
        ->map(function ($teacher) {

            return [

                $teacher->employee_id,

                $teacher->name,

                $teacher->department->name ?? '',

                $teacher->designation->name ?? '',

                $teacher->mobile,

                $teacher->email,

                $teacher->employment_status,

                $teacher->joining_date
            ];
        });
    }

    public function headings(): array
    {
        return [

            'Employee ID',

            'Teacher Name',

            'Department',

            'Designation',

            'Mobile',

            'Email',

            'Employment Status',

            'Joining Date'
        ];
    }
}