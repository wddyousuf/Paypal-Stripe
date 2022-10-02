<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['order_number','student_id','order_price','email','phone','name','txn_id','payment_status','course_id','tax','payment_method'];
}
