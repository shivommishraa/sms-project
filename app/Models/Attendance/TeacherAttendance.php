<?php

namespace App\Models\Attendance;

use Illuminate\Database\Eloquent\Model;

use App\Models\Teacher\Teacher;

class TeacherAttendance extends Model
{
    protected $fillable = [

        'teacher_id',

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
    | Teacher
    |--------------------------------------------------------------------------
    */

    public function teacher()
    {
        return $this->belongsTo(
            Teacher::class
        );
    }
}