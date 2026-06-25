<?php

namespace App\Models\Department;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [

        'name',
        'code',
        'image',
        'description',
        'status',
        'sort_order'

    ];

    public function classes()
    {
        return $this->hasMany(
            \App\Models\ClassMaster\ClassMaster::class
        );
    }
}

