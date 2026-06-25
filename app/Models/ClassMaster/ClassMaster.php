<?php

namespace App\Models\ClassMaster;

use Illuminate\Database\Eloquent\Model;
use App\Models\Department\Department;

class ClassMaster extends Model
{
    protected $table = 'class_masters';

    protected $fillable = [

        'department_id',
        'name',
        'code',
        'image',
        'description',
        'status',
        'sort_order'

    ];

    public function department()
    {
        return $this->belongsTo(
            Department::class
        );
    }

    public function sections()
    {
        return $this->hasMany(
            \App\Models\Section\Section::class
        );
    }
}