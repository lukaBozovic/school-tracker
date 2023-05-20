<?php

namespace App\Models;

use App\Traits\Documentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    use HasFactory;
    use Documentable;

    protected $with = ['documents'];
    protected $table = 'course_student';
    protected $guarded =['id'];

    public function exams(){
        return $this->hasMany(Exam::class);
    }

    public function getTotalPointsAttribute()
    {
        return number_format($this->exams()->sum('points'), 2);
    }
}
