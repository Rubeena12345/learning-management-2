<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enroll;
use Illuminate\Http\Request;

class EnrollController extends Controller
{
    public function index()
    {
        $enrolls = Enroll::with(['course'])->get();
        return view('enrolls.index', compact('enrolls'));
    }


    public function create()
    {
        $courses = Course::all();
        return view('enrolls.create', compact('courses'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'exists:courses,id',
        ]);
        Enroll::create([
            "course_id" => $request->course_id,
        ]);
        return redirect()->route('enrolls.index')->with('success', 'Enroll created successfully');
    }
    public function destroy(Enroll $enroll)
    {
        $enroll->delete();
        return redirect()->route('enrolls.index', compact('enroll'))
            ->with('success', 'enroll deleted successfully');
    }

    public function edit(Request $request, $id)
    {
        $enroll = Enroll::find($id);
        return view('enrolls.edit', compact('enroll'));
    }
}
