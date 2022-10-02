<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Student::all();
        return view('backend.students.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editData = Student::find($id);
        return view('backend.students.createOrEdit')->with('editData', $editData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'reg_no' => 'required',
        ]);
        try {
            Student::where('id', $id)->update($data);
            return redirect()->route('courses.index')->with('success', 'Student updated Successfully ');
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return redirect()->route('courses.index')->with('error', $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Student::where('id', $id)->delete();
            return redirect()->route('courses.index')->with('success', 'Student Deleted Successfully ');
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('error', $message);
        }
    }
}
