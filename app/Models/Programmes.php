<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programmes extends Model
{
    protected $fillable = ['prog_name','prog_id','duration'];

    public function courses(){
        return $this->belongsToMany(Course::class);
    }
    public function registeredStudents(){
        return $this->hasMany(Student::class);
    }
    use HasFactory;
}
