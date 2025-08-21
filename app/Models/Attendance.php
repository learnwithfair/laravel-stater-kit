<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model {
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'checkin',
        'checkout',
        'late_checkin_resons',
        'early_checkout_resons',
        'latitude',
        'longitude',
        'created_at',
    ];

    /**
     * Relationship with Employee model
     */
    public function employee() {
        return $this->belongsTo( Employee::class );
    }
}