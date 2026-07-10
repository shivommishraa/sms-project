<?php

namespace App\Exports;

use App\Models\Attendance\StudentAttendance;
use App\Models\AcademicSession\AcademicSession;
use App\Models\Department\Department;
use App\Models\ClassMaster\ClassMaster;
use App\Models\Section\Section;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentAttendanceExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    ShouldAutoSize
{

    protected $academic_session_id;
    protected $department_id;
    protected $class_master_id;
    protected $section_id;
    protected $from_date;
    protected $to_date;

    public function __construct(
        $academic_session_id,
        $department_id,
        $class_master_id,
        $section_id,
        $from_date,
        $to_date
    ) {

        $this->academic_session_id = $academic_session_id;
        $this->department_id = $department_id;
        $this->class_master_id = $class_master_id;
        $this->section_id = $section_id;
        $this->from_date = $from_date;
        $this->to_date = $to_date;
    }

    public function collection()
    {

        return StudentAttendance::with([

                'student',

                'department',

                'classMaster',

                'section'

            ])

            ->where('academic_session_id', $this->academic_session_id)

            ->where('department_id', $this->department_id)

            ->where('class_master_id', $this->class_master_id)

            ->where('section_id', $this->section_id)

            ->whereBetween('attendance_date', [

                $this->from_date,

                $this->to_date

            ])

            ->orderBy('attendance_date')

            ->orderBy('student_id')

            ->get();

    }

    public function headings(): array
    {

        return [

            'Attendance Date',

            'Admission No',

            'Roll No',

            'Student Name',

            'Department',

            'Class',

            'Section',

            'Status',

            'Remarks',

        ];

    }

    public function map($row): array
    {

        return [

            optional($row->attendance_date)->format('d-m-Y'),

            $row->student->admission_no ?? '',

            $row->student->roll_no ?? '',

            $row->student->name ?? '',

            $row->department->name ?? '',

            $row->classMaster->name ?? '',

            $row->section->name ?? '',

            $row->status,

            $row->remarks,

        ];

    }

}