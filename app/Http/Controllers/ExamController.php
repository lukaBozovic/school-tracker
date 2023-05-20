<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExamRequest;
use App\Models\CourseStudent;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function store(StoreExamRequest $request)
    {
        $courseStudentRelation = CourseStudent::query()
            ->updateOrCreate([
                'course_id' => $request->course_id,
                'student_id' => $request->student_id
            ], [
                'course_id' => $request->course_id,
                'student_id' => $request->student_id
            ]);

        Exam::query()->create([
            'name' => $request->name,
            'description' => $request->description,
            'points' => $request->points,
            'course_student_id' => $courseStudentRelation->id
        ]);
        return redirect()->back();
    }
}
