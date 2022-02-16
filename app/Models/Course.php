<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{   
    protected $fillable = ['course_name','course_id','duration'];

    public function programmes(){
       return $this->belongsToMany(Programmes::class);
    }
    
    use HasFactory;
}

?>