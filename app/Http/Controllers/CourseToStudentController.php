<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseToStudent;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseToStudentController extends Controller
{
    public function create($student_id)
    {
        $data['courses'] = Course::all();
        $data['student'] = Student::where('id', $student_id)->first();
        return view('backend.courseToStudent.createOrEdit')->with('data', $data);
    }

    public function store(Request $request)
    {
        $user_id = $request->student_id;
        foreach ($request->course_id as $key => $course_id) {
            if (CourseToStudent::where('student_id', $user_id)->where('course_id', $course_id)->exists()) {
                CourseToStudent::where('student_id', $user_id)->where('course_id', $course_id)->update([
                    'course_id' => $course_id,
                    'student_id' => $user_id,
                ]);
            } else {
                CourseToStudent::create([
                    'course_id' => $course_id,
                    'student_id' => $user_id,
                ]);
            }
        }
        return redirect()->back()->with('success', 'Course Assigned Successfully ');
    }

    public function assignedcourses($student_id)
    {
        $data = Student::with('courses.course')->where('user_id', $student_id)->first();
        return view('backend.courseToStudent.index')->with('data', $data);
    }

    public function course_details($course_id)
    {
        $data = Course::with('students.student')->where('id', $course_id)->first();
        return view('backend.courseToStudent.courses')->with('data', $data);
    }

    public function assigned()
    {
        $data = Student::with('courses.course')->where('user_id', Auth::user()->id)->first();
        return view('layout.orders')->with('data', $data);
    }
}
