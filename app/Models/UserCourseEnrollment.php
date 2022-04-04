<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourseEnrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id'
    ];

    public function course()
    {
        return $this->belongsTo(Courses::class,'course_id','id');
    }

    public function getStatusAttribute($value)
    {
        if($value == 1){
            return "Ongoing";
        }elseif($value == 0){
            return "Completed";
        }
    }
}
