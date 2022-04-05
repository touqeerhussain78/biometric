<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;

    protected $with = ['webinar_payment.user'];

    public function getVideoAttribute($value)
    {
        return asset("/webinar/video/{$value}");
    }

    public function webinar_payment()
    {
        return $this->belongsTo(WebinarPayment::class,'id','webinar_id');
    }
}
