<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    //protected $fillable = ['name', 'city', 'country', 'description'];
    protected $guarded = ['id'];
    //protected $perPage = 5;


    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}
