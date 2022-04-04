<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $appends = ['avg_rating'];
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

    public function getCourseImageAttribute($value){

        return asset("/images/{$value}");
    }

    public function course_media(){

        return $this->hasMany(CourseMedia::class,'course_id');
    }

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

    public function announcments(){

        return $this->hasMany(Announcment::class,'course_id');
    }

    public function course_enrollment()
    {
        return $this->belongsTo(UserCourseEnrollment::class,'id','course_id');
    }

    public function rating_review()
    {
        return $this->hasMany(CourseReviewRating::class,'course_id');
    }

    public function getAvgRatingAttribute($value)
    {
        return $this->rating_review()->avg('rating');
    }



}
