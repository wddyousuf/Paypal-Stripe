<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseToStudent;
use Exception;
use Illuminate\Http\Request;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use Redirect;

class PaypalController extends Controller
{
    public function pay($request)
    {
        $amount = $request->amount;
        $clientId = env('PAYPAL_CLIENT_ID');
        $clientSecret = env('PAYPAL_CLIENT_SECRET');
        $environment = new SandboxEnvironment($clientId, $clientSecret);
        $client = new PayPalHttpClient($environment);
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => rand(000000, 999999),
                "amount" => [
                    "value" => number_format($amount, 2, '.', ''),
                    "currency_code" => "USD"
                ]
            ]],
            "application_context" => [
                "cancel_url" => url('paypal/cancel'),
                "return_url" => url('paypal/done')
            ]
        ];

        try {
            // Call API with your client and get a response for your call
            $response = $client->execute($request);
            // If call returns body in response, you can get the deserialized version from the result attribute of the response
            return Redirect::to($response->result->links[1]->href);
        } catch (\Exception $ex) {
            dd($ex->getMessage());
            flash($ex->getMessage());
            return redirect()->route('home');
        }
    }

    public function getDone(Request $request)
    {
        $clientId = env('PAYPAL_CLIENT_ID');
        $clientSecret = env('PAYPAL_CLIENT_SECRET');
        $environment = new SandboxEnvironment($clientId, $clientSecret);
        $client = new PayPalHttpClient($environment);
        $ordersCaptureRequest = new OrdersCaptureRequest($request->token);
        $ordersCaptureRequest->prefer('return=representation');
        try {
            // Call API with your client and get a response for your call
            $response = $client->execute($ordersCaptureRequest);
            foreach (CourseToStudent::where('is_paid', 0)->where('student_id', $request->session()->get('student_id'))->get() as $key => $course) {
                Course::where('id', $course->course_id)->increment('sold');
            }
            CourseToStudent::where('is_paid', 0)->where('student_id', $request->session()->get('student_id'))->update([
                'is_paid' => 1
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function getCancel(Request $request)
    {
        echo 'Failed';
        exit;
    }
}