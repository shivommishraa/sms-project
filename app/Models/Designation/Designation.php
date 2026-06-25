<?php

namespace App\Models\Designation;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $fillable = [

        'name',
        'code',
        'image',
        'description',
        'status',
        'sort_order'

    ];
}