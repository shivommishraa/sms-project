<?php

namespace App\Models\AcademicSession;

use Illuminate\Database\Eloquent\Model;

class AcademicSession extends Model
{
    protected $fillable = [

        'name',

        'start_date',

        'end_date',

        'is_current',

        'status',

        'sort_order'
    ];
}