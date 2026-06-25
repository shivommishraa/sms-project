<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;

use App\Models\Department\Department;
use App\Models\Designation\Designation;
use App\Models\AcademicSession\AcademicSession;
use App\Models\Subject\Subject;
use App\Models\Teacher\ClassTeacherAssignment;

class Teacher extends Model
{
    protected $fillable = [

        'department_id',
        'designation_id',
        'academic_session_id',

        'employee_id',

        'name',
        'gender',
        'dob',

        'image',

        'qualification',
        'experience',

        'joining_date',
        'service_end_date',

        'employment_status',

        'mobile',
        'alternate_mobile',

        'email',

        'address',

        'short_bio',
        'description',

        'status',
        'sort_order'
    ];

    protected $casts = [

        'dob' => 'date',
        'joining_date' => 'date',
        'service_end_date' => 'date',

        'status' => 'boolean'
    ];

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
    | Designation
    |--------------------------------------------------------------------------
    */

    public function designation()
    {
        return $this->belongsTo(
            Designation::class
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
    | Subjects
    |--------------------------------------------------------------------------
    */

    public function subjects()
    {
        return $this->belongsToMany(
            Subject::class,
            'teacher_subject'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Class Teacher Assignment
    |--------------------------------------------------------------------------
    */

    public function classTeacherAssignments()
    {
        return $this->hasMany(
            ClassTeacherAssignment::class,
            'teacher_id'
        );
    }

    public function classTeacherAssignment()
    {
        return $this->hasOne(
            ClassTeacherAssignment::class,
            'teacher_id'
        );
    }


    
}