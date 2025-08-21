<?php
namespace App\Services\OTP\Drivers;

use App\Mail\OtpCodeMail;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EmailOtpDriver
{
    protected function otpKey(User $user, string $purpose): string
    {
        return "otp:{$purpose}:user:{$user->id}";
    }
    protected function attemptsKey(User $user, string $purpose): string
    {
        return "otp:attempts:{$purpose}:user:{$user->id}";
    }
    protected function rateKey(User $user, string $purpose): string
    {
        return "otp:rate:{$purpose}:user:{$user->id}";
    }

    public function send(User $user, string $purpose, string $target): array
    {
        $ttlMinutes    = (int) Config::get('otp.expiry_minutes', 10);
        $maxSends      = (int) Config::get('otp.rate_limit', 5);
        $rateWindowMin = 15;

        // rate limit sends
        $rateKey   = $this->rateKey($user, $purpose);
        $sentCount = (int) Cache::get($rateKey, 0);
        if ($sentCount >= $maxSends) {
            return ['success' => false, 'message' => 'Too many code requests. Please try again later.'];
        }

        $code = (string) random_int(100000, 999999);

        $payload = [
            'hash'       => Hash::make($code),
            'purpose'    => $purpose,
            'expires_at' => now()->addMinutes($ttlMinutes)->timestamp,
            'consumed'   => false,
        ];

        Cache::put($this->otpKey($user, $purpose), $payload, now()->addMinutes($ttlMinutes));
        Cache::put($this->attemptsKey($user, $purpose), 0, now()->addMinutes($ttlMinutes));

        // increment send counter in a 15‑min window
        if ($sentCount === 0) {
            Cache::put($rateKey, 1, now()->addMinutes($rateWindowMin));
        } else {
            Cache::increment($rateKey);
        }

        Mail::to($target)->send(new OtpCodeMail($code, $ttlMinutes));

        return ['success' => true];
    }

    public function verify(User $user, string $purpose, string $code): array
    {
        $key      = $this->otpKey($user, $purpose);
        $attemptK = $this->attemptsKey($user, $purpose);
        $maxTries = 5;

        $data = Cache::get($key);
        if (! $data) {
            return ['success' => false, 'message' => 'Code expired or not found.'];
        }
        if (($data['consumed'] ?? false) === true) {
            return ['success' => false, 'message' => 'Code already used.'];
        }
        if (now()->timestamp > ($data['expires_at'] ?? 0)) {
            Cache::forget($key);
            Cache::forget($attemptK);
            return ['success' => false, 'message' => 'Code has expired.'];
        }

        $attempts = (int) Cache::get($attemptK, 0);
        if ($attempts >= $maxTries) {
            return ['success' => false, 'message' => 'Too many incorrect attempts. Try again later.'];
        }

        if (! Hash::check($code, $data['hash'])) {
            Cache::increment($attemptK);
            return ['success' => false, 'message' => 'Invalid code.'];
        }

        // success → consume
        $data['consumed'] = true;
        Cache::put($key, $data, now()->addSeconds(60)); // brief keep
        Cache::forget($attemptK);

        return ['success' => true];
    }
}
