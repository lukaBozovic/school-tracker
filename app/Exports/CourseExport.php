<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CourseExport implements FromView, ShouldAutoSize
{
    protected $courses;

    public function __construct($courses){
        $this->courses = $courses;
    }

    public function view(): View
    {
        return view('exports.course-export', [
            'courses' => $this->courses,
        ]);
    }
}
