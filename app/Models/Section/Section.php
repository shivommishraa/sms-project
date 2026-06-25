<?php

namespace App\Models\Section;

use Illuminate\Database\Eloquent\Model;
use App\Models\ClassMaster\ClassMaster;

class Section extends Model
{
    protected $fillable = [

        'class_master_id',
        'name',
        'code',
        'description',
        'status',
        'sort_order'

    ];

    public function classMaster()
    {
        return $this->belongsTo(
            ClassMaster::class
        );
    }
}