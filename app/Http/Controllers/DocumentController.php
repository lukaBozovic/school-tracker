<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentDocumentRequest;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Document;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function getStudentDocumentsForCourse(Course $course, Student $student){
        $courseStudentRelation = CourseStudent::query()->where('course_id', $course->id)
            ->where('student_id', $student->id)->first();

        return view('documents.index', [
            'course' => $course,
            'student' => $student,
            'documents' => $courseStudentRelation?->documents
        ]);
    }

    public function storeStudentDocument(StoreStudentDocumentRequest $request){

        $courseStudentRelation = CourseStudent::query()
            ->updateOrCreate([
            'course_id' => $request->course_id,
            'student_id' => $request->student_id
        ], [
            'course_id' => $request->course_id,
            'student_id' => $request->student_id
        ]);
       $this->storeFile($request->file('file'), $courseStudentRelation);

       return redirect()->back();
    }

    private function storeFile($file, $courseStudentRelation){
        $name = $file->getClientOriginalName();
        $path = "storage/" . $file->store('course-student-documents');
        $courseStudentRelation->documents()->create([
            'name' => $name,
            'path' => $path
        ]);

        //Alternativni nacin
//        Document::query()->create([
//            'name' => $name,
//            'path' => $path,
//            'documentable_id' => $courseStudentRelation->id,
//            'documentable_type' => CourseStudent::class
//        ]);
    }

}
