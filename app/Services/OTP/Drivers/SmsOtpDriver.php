<?php

// app/Services/OTP/Drivers/SmsOtpDriver.php
namespace App\Services\OTP\Drivers;

use App\Models\User;

class SmsOtpDriver
{
    public function send(User $user, string $purpose, string $target): array
    {
        return ['success' => false, 'message' => 'SMS driver not enabled yet.'];
    }
}
