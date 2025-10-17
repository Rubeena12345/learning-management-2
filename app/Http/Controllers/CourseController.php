<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::get()->all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string|max:100",
            "description" => "required",
            "price" => "required",
        ]);
        Course::create([
            "title" => $request->title,
            "description" => $request->description,
            "price" => $request->price,
        ]);
        return redirect()->route('courses.index')->with('success', 'Courses created successfully');
    }


    public function edit(Request $request, $id)
    {
        $course = Course::find($id);
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "title" => "required|string|max:100",
            "description" => "required",
            "price" => "required",
        ]);
        $course = Course::find($id);
        $course->update([
            "title" => $request->title,
            "description" => $request->description,
            "price" => $request->price,
        ]);
        return redirect()->route('courses.index')->with('success', 'Course updated successfully');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index', compact('course'))
            ->with('success', 'course deleted successfully');
    }
}
