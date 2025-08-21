<?php
namespace App\Services\OTP\Drivers;

use App\Models\User;

class WhatsappOtpDriver
{
    public function send(User $user, string $purpose, string $target): array
    {
        return ['success' => false, 'message' => 'WhatsApp driver not enabled yet.'];
    }
}
