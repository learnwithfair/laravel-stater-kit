<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notice extends Model {
    use HasFactory;
    protected $fillable = array(
        'company_code',
        'title',
        'description',
    );

    public function user(): BelongsTo {
        return $this->belongsTo( User::class, 'company_code', 'company_code' );
    }
}