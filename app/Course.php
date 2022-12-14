<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['course_name', 'course_code', 'course_price', 'discounted_price', 'sold', 'views'];
    public function students()
    {
        return $this->hasMany(CourseToStudent::class, 'course_id', 'id');
    }
}