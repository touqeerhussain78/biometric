<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;


    /**
     * Get the user associated with the Courses
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function payment()
    {
        return $this->hasOne(PaymentLog::class, 'course_id', 'id');
    }

    /**
     * Get the user that owns the Courses
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    /**
     * Get all of the comments for the Courses
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function course_enroll()
    {
        return $this->hasMany(UserEnroll::class, 'course_id', 'id');
    }

    public function course_objective()
    {
        return $this->hasMany(CourseObjective::class, 'course_id', 'id');
    }

    public function question()
    {
        return $this->hasMany(EnrollmentQuestion::class, 'course_id', 'id');
    }

}
