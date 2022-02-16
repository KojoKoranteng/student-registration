<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function getFullNameAttribute(){
        return $this->firstName.' '.$this->lastName;
        //return"{$this->firstName} {$this->lastName}";
    }

    use HasFactory;
}
