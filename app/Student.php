<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=['user_id','first_name','last_name','reg_no'];
    public function courses(){
        return $this->hasMany(CourseToStudent::class,'student_id','id');
    }
}
