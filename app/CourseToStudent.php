<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseToStudent extends Model
{
    protected $fillable=['course_id','student_id'];
}