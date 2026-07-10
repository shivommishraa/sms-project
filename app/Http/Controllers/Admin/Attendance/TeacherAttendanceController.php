<?php

namespace App\Http\Controllers\Admin\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Teacher\Teacher;
use App\Models\Attendance\TeacherAttendance;
use App\Models\AcademicSession\AcademicSession;
use App\Models\Department\Department;
use App\Models\ClassMaster\ClassMaster;
use App\Models\Section\Section;use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class TeacherAttendanceController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Teacher Attendance Page
    |--------------------------------------------------------------------------
    */

    public function index()
    {

        $sessions = AcademicSession::where('status',1)
                        ->orderBy('sort_order')
                        ->orderBy('name')
                        ->get();

        $departments = Department::where('status',1)
                        ->orderBy('sort_order')
                        ->orderBy('name')
                        ->get();

        return view(
            'admin.attendance.teachers.index',
            compact(
                'sessions',
                'departments'
            )
        );

    }
    /*
|--------------------------------------------------------------------------
| Load Teachers
|--------------------------------------------------------------------------
*/

public function loadTeachers(Request $request)
{

    $request->validate([

        'academic_session_id' => 'required|exists:academic_sessions,id',

        'department_id' => 'required|exists:departments,id',

        'attendance_date' => 'required|date',

    ]);

    $sessions = AcademicSession::where('status',1)
                    ->orderBy('sort_order')
                    ->orderBy('name')
                    ->get();

    $departments = Department::where('status',1)
                    ->orderBy('sort_order')
                    ->orderBy('name')
                    ->get();

    $teachers = Teacher::where('department_id', $request->department_id)
                    ->where('status',1)
                    ->orderBy('name')
                    ->get();

    $attendanceRecords = TeacherAttendance::whereDate(
                            'attendance_date',
                            $request->attendance_date
                        )->get();

    $attendance = [];

    $remarks = [];

    foreach ($attendanceRecords as $record) {

        $attendance[$record->teacher_id] = $record->status;

        $remarks[$record->teacher_id] = $record->remarks;

    }

    return view(
        'admin.attendance.teachers.index',
        compact(
            'sessions',
            'departments',
            'teachers',
            'attendance',
            'remarks'
        )
    )->with([

        'academic_session_id' => $request->academic_session_id,

        'department_id' => $request->department_id,

        'attendance_date' => $request->attendance_date,

    ]);

}
/*
|--------------------------------------------------------------------------
| Save Teacher Attendance
|--------------------------------------------------------------------------
*/

public function store(Request $request)
{

    $request->validate([

        'attendance_date' => 'required|date',

        'attendance' => 'required|array',

    ]);

    foreach ($request->attendance as $teacherId => $status) {

        TeacherAttendance::updateOrCreate(

            [

                'teacher_id' => $teacherId,

                'attendance_date' => $request->attendance_date,

            ],

            [

                'status' => $status,

                'remarks' => $request->remarks[$teacherId] ?? null,

                'created_by' => auth()->id(),

            ]

        );

    }

    return redirect()

        ->route('attendance.teachers.index')

        ->with(

            'success',

            'Teacher attendance saved successfully.'

        );

}


/*
|--------------------------------------------------------------------------
| Teacher Attendance Report
|--------------------------------------------------------------------------
*/

public function report(Request $request)
{

    $sessions = AcademicSession::where('status',1)
                    ->orderBy('sort_order')
                    ->orderBy('name')
                    ->get();

    $departments = Department::where('status',1)
                    ->orderBy('sort_order')
                    ->orderBy('name')
                    ->get();

    $teachers = Teacher::where('status',1)
                    ->orderBy('name')
                    ->get();

    $attendance = collect();

    if($request->filled('from_date')){

        $attendance = TeacherAttendance::with([
                'teacher.designation',
                'teacher.department'
            ])
            ->when($request->department_id,function($q) use($request){

                $q->whereHas('teacher',function($teacher){

                    $teacher->where('department_id',request('department_id'));

                });

            })
            ->when($request->teacher_id,function($q) use($request){

                $q->where('teacher_id',$request->teacher_id);

            })
            ->whereBetween(
                'attendance_date',
                [
                    $request->from_date,
                    $request->to_date
                ]
            )
            ->latest('attendance_date')
            ->get();

    }

    return view(
        'admin.attendance.teachers.report',
        compact(
            'sessions',
            'departments',
            'teachers',
            'attendance'
        )
    );

}


/*
|--------------------------------------------------------------------------
| Teacher Attendance PDF
|--------------------------------------------------------------------------
*/

public function reportPdf(Request $request)
{

    // PDF code next part

}

/*
|--------------------------------------------------------------------------
| Teacher Attendance Excel
|--------------------------------------------------------------------------
*/

public function reportExcel(Request $request)
{

    // Excel code next part

}


}