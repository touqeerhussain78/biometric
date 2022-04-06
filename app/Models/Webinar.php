<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;

    protected $with = ['user_webinars.user'];

    public function getVideoAttribute($value)
    {
        return asset("/webinar/video/{$value}");
    }

    public function user_webinars()
    {
        return $this->hasOne(UserWebinar::class,'webinar_id');
    }

}
