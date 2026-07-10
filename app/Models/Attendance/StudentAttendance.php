<?php

namespace App\Models\Attendance;

use Illuminate\Database\Eloquent\Model;

use App\Models\Student\Student;
use App\Models\Department\Department;
use App\Models\AcademicSession\AcademicSession;
use App\Models\ClassMaster\ClassMaster;
use App\Models\Section\Section;

class StudentAttendance extends Model
{
    protected $fillable = [

        'academic_session_id',

        'department_id',

        'class_master_id',

        'section_id',

        'student_id',

        'attendance_date',

        'status',

        'remarks',

        'created_by'

    ];

    protected $casts = [

        'attendance_date' => 'date'

    ];

    /*
    |--------------------------------------------------------------------------
    | Student
    |--------------------------------------------------------------------------
    */

    public function student()
    {
        return $this->belongsTo(
            Student::class
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Department
    |--------------------------------------------------------------------------
    */

    public function department()
    {
        return $this->belongsTo(
            Department::class
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Academic Session
    |--------------------------------------------------------------------------
    */

    public function academicSession()
    {
        return $this->belongsTo(
            AcademicSession::class
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Class
    |--------------------------------------------------------------------------
    */

    public function classMaster()
    {
        return $this->belongsTo(
            ClassMaster::class
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Section
    |--------------------------------------------------------------------------
    */

    public function section()
    {
        return $this->belongsTo(
            Section::class
        );
    }
}