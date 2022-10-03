<?php

namespace App\Http\Controllers;

use App\CourseToStudent;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function pay($request){
        return view('common.stripe');
    }

    public function create_checkout_session(Request $request){
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
        ]);

        CourseToStudent::where('is_paid',0)->where('student_id',$request->session()->get('student_id'))->update([
            'is_paid'=>1
        ]);

        return back();
    }
}
