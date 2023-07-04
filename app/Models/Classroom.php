<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model 
{

    protected $table = 'classrooms';
    public $timestamps = true;

    public function Grades()
    {
        return $this->belongsTo('Grade', 'Grade_id');
    }

}