<?php

namespace App\Http\Controllers\Admin\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\StudentAttendanceExport;

use App\Models\Attendance\StudentAttendance;
use App\Models\AcademicSession\AcademicSession;
use App\Models\Department\Department;
use App\Models\ClassMaster\ClassMaster;
use App\Models\Section\Section;
use App\Models\Student\Student;

class StudentAttendanceController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Student Attendance Screen
    |--------------------------------------------------------------------------
    */

    public function index()
    {

        $sessions = AcademicSession::orderBy('name')->get();

        $departments = Department::orderBy('name')->get();

        $classes = ClassMaster::orderBy('name')->get();

        $sections = Section::orderBy('name')->get();

        return view(

            'admin.attendance.students.index',

            compact(

                'sessions',

                'departments',

                'classes',

                'sections'

            )

        );

    }

    /*
    |--------------------------------------------------------------------------
    | Load Students
    |--------------------------------------------------------------------------
    */

    public function loadStudents(Request $request)
    {

        $request->validate([

            'academic_session_id' => 'required',

            'department_id' => 'required',

            'class_master_id' => 'required',

            'section_id' => 'required',

            'attendance_date' => 'required|date',

        ]);

        $sessions = AcademicSession::orderBy('name')->get();

        $departments = Department::orderBy('name')->get();

        $classes = ClassMaster::orderBy('name')->get();

        $sections = Section::orderBy('name')->get();

        $students = Student::with([

                'department',

                'classMaster',

                'section'

            ])

            ->where('academic_session_id',$request->academic_session_id)

            ->where('department_id',$request->department_id)

            ->where('class_master_id',$request->class_master_id)

            ->where('section_id',$request->section_id)

            ->where('status',1)

            ->orderBy('roll_no')

            ->get();

        $attendance = StudentAttendance::where(

                'attendance_date',

                $request->attendance_date

            )

            ->where(

                'class_master_id',

                $request->class_master_id

            )

            ->where(

                'section_id',

                $request->section_id

            )

            ->pluck(

                'status',

                'student_id'

            )

            ->toArray();

        $remarks = StudentAttendance::where(

                'attendance_date',

                $request->attendance_date

            )

            ->where(

                'class_master_id',

                $request->class_master_id

            )

            ->where(

                'section_id',

                $request->section_id

            )

            ->pluck(

                'remarks',

                'student_id'

            )

            ->toArray();

        return view(

            'admin.attendance.students.index',

            compact(

                'sessions',

                'departments',

                'classes',

                'sections',

                'students',

                'attendance',

                'remarks'

            )

        )

        ->with([

            'selectedDate' => $request->attendance_date,

            'selectedSession' => $request->academic_session_id,

            'selectedDepartment' => $request->department_id,

            'selectedClass' => $request->class_master_id,

            'selectedSection' => $request->section_id,

        ]);

    }

        /*
    |--------------------------------------------------------------------------
    | Save Student Attendance
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {

        $request->validate([

            'academic_session_id' => 'required',

            'department_id' => 'required',

            'class_master_id' => 'required',

            'section_id' => 'required',

            'attendance_date' => 'required|date',

            'attendance' => 'required|array',

        ]);


        foreach ($request->attendance as $studentId => $status) {

            StudentAttendance::updateOrCreate(

                [

                    'student_id' => $studentId,

                    'attendance_date' => $request->attendance_date,

                ],

                [

                    'academic_session_id' => $request->academic_session_id,

                    'department_id' => $request->department_id,

                    'class_master_id' => $request->class_master_id,

                    'section_id' => $request->section_id,

                    'status' => $status,

                    'remarks' => $request->remarks[$studentId] ?? null,

                    'created_by' => auth()->id(),

                ]

            );

        }

        return redirect()

            ->back()

            ->with(

                'success',

                'Student attendance saved successfully.'

            );

    }


    /*
    |--------------------------------------------------------------------------
    | Student Attendance Report
    |--------------------------------------------------------------------------
    */

    public function report(Request $request)
    {

        $sessions = AcademicSession::orderBy('name')->get();

        $departments = Department::orderBy('name')->get();

        $classes = ClassMaster::orderBy('name')->get();

        $sections = Section::orderBy('name')->get();

        $attendance = collect();

        $session = null;

        $department = null;

        $class = null;

        $section = null;


        if ($request->filled('from_date')) {

            $attendance = StudentAttendance::with([

                    'student',

                    'department',

                    'classMaster',

                    'section'

                ])

                ->where('academic_session_id', $request->academic_session_id)

                ->where('department_id', $request->department_id)

                ->where('class_master_id', $request->class_master_id)

                ->where('section_id', $request->section_id)

                ->whereBetween('attendance_date', [

                    $request->from_date,

                    $request->to_date

                ])

                ->orderBy('attendance_date')

                ->orderBy('student_id')

                ->get();


            $session = AcademicSession::find($request->academic_session_id);

            $department = Department::find($request->department_id);

            $class = ClassMaster::find($request->class_master_id);

            $section = Section::find($request->section_id);

        }


        return view(

            'admin.attendance.students.report',

            compact(

                'sessions',

                'departments',

                'classes',

                'sections',

                'attendance',

                'session',

                'department',

                'class',

                'section'

            )

        );

    }
        /*
    |--------------------------------------------------------------------------
    | Download PDF Report
    |--------------------------------------------------------------------------
    */

    public function reportPdf(Request $request)
    {

        $attendance = StudentAttendance::with([

                'student',

                'department',

                'classMaster',

                'section'

            ])

            ->where('academic_session_id',$request->academic_session_id)

            ->where('department_id',$request->department_id)

            ->where('class_master_id',$request->class_master_id)

            ->where('section_id',$request->section_id)

            ->whereBetween('attendance_date',[

                $request->from_date,

                $request->to_date

            ])

            ->orderBy('attendance_date')

            ->orderBy('student_id')

            ->get();


        $session = AcademicSession::find($request->academic_session_id);

        $department = Department::find($request->department_id);

        $class = ClassMaster::find($request->class_master_id);

        $section = Section::find($request->section_id);


        $pdf = Pdf::loadView(

            'admin.attendance.students.pdf',

            compact(

                'attendance',

                'session',

                'department',

                'class',

                'section'

            ) + [

                'fromDate' => $request->from_date,

                'toDate'   => $request->to_date

            ]

        )->setPaper('a4','landscape');


        return $pdf->download(

            'student-attendance-report.pdf'

        );

    }


    /*
    |--------------------------------------------------------------------------
    | Export Excel Report
    |--------------------------------------------------------------------------
    */

    public function reportExcel(Request $request)
    {

        return Excel::download(

            new StudentAttendanceExport(

                $request->academic_session_id,

                $request->department_id,

                $request->class_master_id,

                $request->section_id,

                $request->from_date,

                $request->to_date

            ),

            'student-attendance-report.xlsx'

        );

    }

}