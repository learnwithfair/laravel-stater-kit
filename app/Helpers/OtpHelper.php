<?php

namespace App\Helpers;

use App\Mail\OtpCodeMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class OtpHelper
{
    /**
     * Generate and send OTP to email
     *
     * @param string $email
     * @param string $type e.g. 'register', 'forgot_password'
     * @return JsonResponse
     */
    public static function sendEmailOtp(string $email, string $type = 'generic'): JsonResponse
    {
        $otpKey   = "user_otp_{$email}";
        $countKey = "otp_send_count_{$email}";

        $titles = [
            'register'        => 'Registration Verification',
            'forgot_password' => 'Reset Password Notification',
            'login'           => 'Login Verification',
            'password'        => 'Password Change Notification',
            'generic'         => 'Verification Code'
        ];

        $title = $titles[$type] ?? 'Verification Code';

        $maxAttempts  = 3;
        $currentCount = Cache::get($countKey, 0);

        if ($currentCount >= $maxAttempts) {
            $ttl     = Cache::getRedis()->ttl($countKey);
            $minutes = ceil($ttl / 60);

            Log::warning('OTP send limit reached', [
                'email'    => self::maskEmail($email),
                'attempts' => $currentCount,
                'type'     => $type,
                'wait_for' => $minutes . ' min'
            ]);

            return buildResponse('error', null, "OTP resend limit reached. Try again in {$minutes} minute(s).", 429);
        }

        // Generate OTP
        $otp = rand(1000, 9999);
        $ttlMinutes = 5;
        Cache::put($otpKey, $otp, now()->addMinutes($ttlMinutes));

        // Track resend attempts
        Cache::put($countKey, $currentCount + 1, now()->addHour());

        // Send email
        Mail::to($email)->send(new OtpCodeMail($otp, $ttlMinutes, $title));

        // Log securely
        Log::info('OTP sent', [
            'email'     => self::maskEmail($email),
            'type'      => $type,
            'ttl'       => $ttlMinutes . ' min',
            'timestamp' => now()->toDateTimeString()
        ]);

        return buildResponse('success', ['otp' => $otp], 'OTP sent successfully.', 200);
    }

    /**
     * Mask email for privacy in logs
     */
    private static function maskEmail(string $email): string
    {
        $parts = explode('@', $email);
        $name  = substr($parts[0], 0, 2) . str_repeat('*', max(strlen($parts[0]) - 2, 0));
        return $name . '@' . $parts[1];
    }
}
