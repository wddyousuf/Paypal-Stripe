<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseToStudent extends Model
{
    protected $fillable = ['course_id', 'student_id'];
    public function course()
    {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }
    public function student()
    {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }
}