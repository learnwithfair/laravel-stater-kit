<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model {
    use HasFactory;

    protected $fillable = ['title', 'date', 'company_code'];

    // Relationship with User Model
    public function user() {
        return $this->belongsTo( User::class, 'company_code', 'company_code' );
    }
}
