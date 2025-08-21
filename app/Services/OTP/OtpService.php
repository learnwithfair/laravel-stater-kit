<?php
namespace App\Services\OTP;

use App\Models\User;
use App\Services\OTP\Drivers\EmailOtpDriver;
use App\Services\OTP\Drivers\SmsOtpDriver;
use App\Services\OTP\Drivers\WhatsappOtpDriver;

class OtpService
{
    public function __construct(
        private EmailOtpDriver $email,
        private SmsOtpDriver $sms,
        private WhatsappOtpDriver $whatsapp,
    ) {}

    public function send(User $user, string $purpose, string $driver, string $target): array
    {
        $impl = match (strtolower($driver)) {
            'sms' => $this->sms,
            'whatsapp' => $this->whatsapp,
            default => $this->email,
        };

        return $impl->send($user, $purpose, $target);
    }

    /**
     * Verify a code. If $driver is null, we'll use whatever was stored in session (otp_context.driver),
     * and default to 'email' if absent.
     */
    public function verify(User $user, string $purpose, string $code, ?string $driver = null): array
    {
        $driver = $driver ?? (session('otp_context.driver') ?: 'email');

        $impl = match (strtolower($driver)) {
            'sms' => $this->sms,
            'whatsapp' => $this->whatsapp,
            default => $this->email,
        };

        // All drivers should expose a verify() with same signature
        return $impl->verify($user, $purpose, $code);
    }
}
