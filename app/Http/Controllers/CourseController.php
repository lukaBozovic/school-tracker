<?php

namespace App\Http\Controllers;

use App\Exports\CourseExport;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Program;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CourseController extends Controller
{

    private function getCoursesByStudent($mark = null){
        $authStudent = auth()->user()->student;
        $courses = $authStudent->program->courses()
            ->with('courseStudents', function ($query) use ($authStudent) {
                $query->where('student_id', $authStudent->id);
            })
            ->orderBy('semester')
            ->get();

        if ($mark){
            $courses = $courses->filter(function ($course) use ($mark) {
                $totalPoints = $course->courseStudents->first()?->total_points;
                if ($mark == 'A')
                    return $totalPoints >= 90;
                else if ($mark == 'B')
                    return $totalPoints >= 80;
                else if ($mark == 'C')
                    return $totalPoints >= 70;
                else if ($mark == 'D')
                    return $totalPoints >= 60;
                else if ($mark == 'E')
                    return $totalPoints >= 50;
                else
                    return true;
            });
        }

        return $courses;
    }
    /**
     * Display a listing of the resource.
     */
    //this function is only used by student
    public function index()
    {
        $courses = $this->getCoursesByStudent();

        return view('courses.index', ['courses' => $courses]);
    }

    public function export(Request $request) {
        $courses = $this->getCoursesByStudent($request['mark']);

        return Excel::download(new CourseExport($courses), 'courses-export.xlsx');
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
