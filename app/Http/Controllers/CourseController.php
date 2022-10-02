<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $data = Course::all();
        return view('backend.courses.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.courses.createOrEdit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $data = $this->validate($request, [
            'course_name' => 'required|unique:courses,course_name',
            'course_code' => 'required|string',
            'course_price' => 'required',
            'discounted_price' => 'sometimes',
        ]);
        try {
            Course::create($data);
            return redirect()->route('courses.index')->with('success', 'Course Created Successfully ');
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return redirect()->route('courses.index')->with('error', $message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $editData = Course::find($id);
        return view('backend.courses.createOrEdit')->with('editData', $editData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'course_name' => 'required|unique:courses,course_name,' . $id,
            'course_code' => 'required|string',
            'course_price' => 'required',
            'discounted_price' => 'sometimes',
        ]);
        try {
            Course::where('id', $id)->update($data);
            return redirect()->route('courses.index')->with('success', 'Course updated Successfully ');
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return redirect()->route('courses.index')->with('error', $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            Course::where('id', $id)->delete();
            return redirect()->route('courses.index')->with('success', 'Course Deleted Successfully ');
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('error', $message);
        }
    }
}
