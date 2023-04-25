<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function create(Request $request)
    {
        $this->checkStudentExisting();

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
        return redirect()->route('dashboard');
    }

    private function checkStudentExisting(){
        if(auth()->user()->student != null)
            return redirect()->route('dashboard');
    }
}
