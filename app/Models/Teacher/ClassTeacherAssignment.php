<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;

use App\Models\Teacher\Teacher;
use App\Models\ClassMaster\ClassMaster;
use App\Models\Section\Section;
use App\Models\AcademicSession\AcademicSession;

class ClassTeacherAssignment extends Model
{
    protected $fillable = [

        'academic_session_id',
        'class_master_id',
        'section_id',
        'teacher_id',
        'status'
    ];

    protected $casts = [

        'status' => 'boolean'
    ];

    /*
    |--------------------------------------------------------------------------
    | Teacher
    |--------------------------------------------------------------------------
    */

    public function teacher()
    {
        return $this->belongsTo(
            Teacher::class
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
}