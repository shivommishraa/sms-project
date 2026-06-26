<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

use App\Models\Department\Department;
use App\Models\AcademicSession\AcademicSession;
use App\Models\ClassMaster\ClassMaster;
use App\Models\Section\Section;

class Student extends Model
{
    protected $fillable = [

        /*
        |--------------------------------------------------------------------------
        | Academic Information
        |--------------------------------------------------------------------------
        */

        'academic_session_id',

        'department_id',

        'class_master_id',

        'section_id',

        'admission_no',

        'roll_no',

        'admission_date',

        /*
        |--------------------------------------------------------------------------
        | Personal Information
        |--------------------------------------------------------------------------
        */

        'name',

        'gender',

        'dob',

        'blood_group',

        'category',

        'religion',

        'aadhaar_no',

        'image',

        /*
        |--------------------------------------------------------------------------
        | Parent Information
        |--------------------------------------------------------------------------
        */

        'father_name',

        'father_mobile',

        'mother_name',

        'mother_mobile',

        'guardian_name',

        'guardian_mobile',

        'father_occupation',

        'mother_occupation',

        'guardian_relation',

        'emergency_contact',

        /*
        |--------------------------------------------------------------------------
        | Contact Information
        |--------------------------------------------------------------------------
        */

        'student_mobile',

        'email',

        'address',

        'city',

        'state',

        'pincode',

        /*
        |--------------------------------------------------------------------------
        | Transport
        |--------------------------------------------------------------------------
        */

        'transport_allotted',

        'transport_required',

        'bus_number',

        /*
        |--------------------------------------------------------------------------
        | Other Information
        |--------------------------------------------------------------------------
        */

        'previous_school',

        'description',

        'status',

        'sort_order'
    ];

    protected $casts = [

        'admission_date' => 'date',

        'dob' => 'date',

        'transport_allotted' => 'boolean',

        'status' => 'boolean'
    ];

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