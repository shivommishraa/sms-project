<?php

namespace App\Exports;

use App\Models\Student\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Font;
class StudentsExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    ShouldAutoSize,
    WithEvents
{
    public function collection()
    {
        return Student::with([
            'department',
            'academicSession',
            'classMaster',
            'section'
        ])->orderBy('name')->get();
    }

    public function headings(): array
    {
        return [
            'Admission No',
            'Roll No',
            'Student Name',
            'Department',
            'Academic Session',
            'Class',
            'Section',
            'Gender',
            'Date Of Birth',
            'Blood Group',
            'Category',
            'Religion',
            'Student Mobile',
            'Father Name',
            'Father Mobile',
            'Father Occupation',
            'Mother Name',
            'Mother Mobile',
            'Mother Occupation',
            'Guardian Name',
            'Guardian Mobile',
            'Guardian Relation',
            'Email',
            'Emergency Contact',
            'Address',
            'City',
            'State',
            'Pincode',
            'Transport',
            'Bus Number',
            'Previous School',
            'Status',
        ];
    }

    public function map($student): array
    {
        return [
            $student->admission_no,
            $student->roll_no,
            $student->name,
            $student->department->name ?? '-',
            $student->academicSession->name ?? '-',
            $student->classMaster->name ?? '-',
            $student->section->name ?? '-',
            $student->gender,
            optional($student->dob)->format('d-m-Y'),
            $student->blood_group,
            $student->category,
            $student->religion,
            $student->student_mobile,
            $student->father_name,
            $student->father_mobile,
            $student->father_occupation,
            $student->mother_name,
            $student->mother_mobile,
            $student->mother_occupation,
            $student->guardian_name,
            $student->guardian_mobile,
            $student->guardian_relation,
            $student->email,
            $student->emergency_contact,
            $student->address,
            $student->city,
            $student->state,
            $student->pincode,
            $student->transport_required ? 'Yes' : 'No',
            $student->bus_number,
            $student->previous_school,
            $student->status ? 'Active' : 'Inactive',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                // Header row ko bold karna (Row 1)
                $event->sheet->getStyle('A1:AG1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                ]);

            },
        ];
    }
}