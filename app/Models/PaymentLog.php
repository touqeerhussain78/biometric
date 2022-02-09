<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the PaymentLog
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course() 
    {
        return $this->belongsTo(Courses::class, 'course_id', 'id');
    }

    /**
     * Get the user that owns the PaymentLog
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_enroll()
    {
        return $this->belongsTo(UserEnroll::class, 'course_id', 'course_id');
    }
}
