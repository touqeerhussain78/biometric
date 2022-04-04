<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoleAndPermission;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'image',
        'email',
        'password',
        'code',
        'status',
        'age',
        'phone_number',
        'interset_in_course'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    
   	
	public function getImageAttribute($value){
        return asset("/user/{$value}");
    }

    public function user_enroll()
    {
        return $this->hasMany(UserEnroll::class, 'user_id', 'id');
    }


    public function notifications()

    {
        return $this->morphMany(Notification::class, 'notifiable')->whereReadAt(null)->latest();
    }

    public function course_enrollment()
    {
        return $this->hasOne(UserCourseEnrollment::class,'user_id');
    }
    
}
