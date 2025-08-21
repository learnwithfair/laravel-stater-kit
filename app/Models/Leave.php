<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model {
    use HasFactory;

    protected $table = 'leave'; // The table name

    protected $fillable = [
        'employee_id',
        'subject',
        'description',
        'attachment',
        'start_date',
        'end_date',
        'is_supervisor_approve',
        'is_admin_approve',
        'read_at',
    ];

    // Relationship to Employee model
    public function employee() {
        return $this->belongsTo( Employee::class, 'employee_id' );
    }
}
