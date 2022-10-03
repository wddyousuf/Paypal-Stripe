<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $paypal;
    protected $stripe;
    public function __construct(PaypalController $paypal,StripeController $stripe){
        $this->paypal=$paypal;
        $this->stripe=$stripe;
    }
    public function pay(Request $request){
        $request->session()->put('student_id',$request->student_id);
        $request->session()->put('amount',$request->amount);
        if ($request->gateway=='paypal') {
            return $this->paypal->pay($request);
        }else {
            return $this->stripe->pay($request);
        }
    }
}
