<?php

namespace App\Models\Subject;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [

        'department_id',
        'class_master_id',
        'section_id',

        'name',
        'code',
        'type',

        'image',
        'description',

        'status',
        'sort_order'
    ];

    public function department()
    {
        return $this->belongsTo(
            \App\Models\Department\Department::class
        );
    }

    public function classMaster()
    {
        return $this->belongsTo(
            \App\Models\ClassMaster\ClassMaster::class
        );
    }

    public function section()
    {
        return $this->belongsTo(
            \App\Models\Section\Section::class
        );
    }
}