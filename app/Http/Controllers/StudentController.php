<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Mail\EnteringMail;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{

    public function create(Request $request)
    {
        if ($this->checkStudentExisting())
            return redirect()->route('dashboard');

        if ($request->faculty_id)
            $currentPrograms = Program::query()->where('faculty_id', $request->faculty_id)->get();
        else
            $currentPrograms = null;

        return view('students.create', [
            'faculties' => Faculty::all(),
            'currentPrograms' => $currentPrograms
        ]);
    }
    public function store(StoreStudentRequest $request)
    {
        Student::query()->create(
            $request->validated()
        );
        Mail::to(auth()->user())->send(new EnteringMail());
        return redirect()->route('dashboard');
    }

    private function checkStudentExisting(){
        if(auth()->user()->student != null)
           return true;
        return false;
    }

    public function getStudentCoursePage(Course $course, Student $student){
        $courseStudentRelation = CourseStudent::query()->where('course_id', $course->id)
            ->where('student_id', $student->id)->first();

        return view('students.course-student', [
            'course' => $course,
            'student' => $student,
            'documents' => $courseStudentRelation?->documents,
            'exams' => $courseStudentRelation?->exams
        ]);
    }

}
