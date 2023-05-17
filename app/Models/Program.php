<?php

namespace App\Models;

use App\Traits\Documentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Program extends Model
{
    use HasFactory;
    use Documentable;
    protected $guarded = ['id'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function programType()
    {
        return $this->belongsTo(ProgramType::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

}
