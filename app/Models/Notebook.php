<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notebook extends Model {
    protected $fillable = array(
        'employee_id',
        'description',
    );
}