<?php

namespace App\Models;

use App\Notifications\EmployeeResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable {
    use HasFactory, Notifiable;

    protected $fillable = [
        'supervisor_id',
        'name',
        'email',
        'phone',
        'company_code',
        'role',
        'employee_type',
        'employment_type',
        'password',
        'total_leave',
        'status',
        'is_supervisor',
        'department',
        'image',
    ];

    protected $hidden = [
        'password',
    ];

    public function sendPasswordResetNotification( $token ) {
        $this->notify( new EmployeeResetPasswordNotification( $token ) );
    }

    public function user() {
        return $this->belongsTo( User::class, 'company_code', 'company_code' );
    }
    /**
     * Relationship with Attendance model
     */
    public function attendances() {
        return $this->hasMany( Attendance::class );
    }

    public function leaves() {
        return $this->hasMany( Leave::class );
    }

    // Define Supervisor Relationship
    public function supervisor() {
        return $this->belongsTo( Employee::class, 'supervisor_id' );
    }

    // Define Employees Under This Supervisor
    public function subordinates() {
        return $this->hasMany( Employee::class, 'supervisor_id' );
    }

}