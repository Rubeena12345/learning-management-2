<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    protected $fillable = ['course_id'];

    public function Course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
