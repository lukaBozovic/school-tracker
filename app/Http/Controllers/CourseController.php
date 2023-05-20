<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Program;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //this function is only used by student
    public function index()
    {
        $authStudent = auth()->user()->student;

        $courses = $authStudent->program->courses()
            ->with('courseStudents', function ($query) use ($authStudent) {
                $query->where('student_id', $authStudent->id);
            })
            ->orderBy('semester')
            ->get();

        return view('courses.index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Program $program)
    {
        return view('courses.create', ['program_id' => $program->id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        Course::query()->create($request->validated());
        $program = Program::query()
            ->find($request->program_id)
            ->load(['programType', 'courses']);
        return redirect()->route('programs.show', ['program' => $program]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('courses.show', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());
        $program = $course->program;
        return redirect()->route('programs.show', ['program' => $program->load(['programType', 'courses'])]);
    }

    public function destroy(Course $course)
    {
        $program = $course->program;
        $course->delete();
        return redirect()->route('programs.show', ['program' => $program->load(['programType', 'courses'])]);
    }
}
