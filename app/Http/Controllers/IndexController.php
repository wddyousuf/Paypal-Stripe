<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Controllers\Controller;
use App\Model\Contact;
use App\User;
use App\Webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $data['courses'] = Course::all()->count();
        $data['users'] = User::where('role_id', 2)->get()->count();
//        dd($data);
        return view('backend.layouts.home')->with('data', $data);
    }
}
