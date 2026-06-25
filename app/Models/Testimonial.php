<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'image',
        'rating',
        'message',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}