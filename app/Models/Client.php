<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable {
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'phone_number', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
