<?php

namespace App\Models;

use App\Traits\Documentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Faculty extends Model
{
    use HasFactory;
    use Documentable;
    //protected $fillable = ['name', 'city', 'country', 'description'];
    protected $guarded = ['id'];
    //protected $perPage = 5;


    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}
