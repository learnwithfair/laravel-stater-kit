<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public string $code, public int $ttlMinutes)
    {}

    public function build()
    {
        return $this->subject("Your Verification code: {$this->code}")
            ->view('emails.otp')
            ->with([
                'code'       => $this->code,
                'ttl'        => $this->ttlMinutes,
                'supportUrl' => config('app.url') . '/support',
                'logoUrl'    => url('/assets/img/logo/logo.png'),
                'appName'    => config('app.name', 'HajiMail'),
                'sentAt'     => now()->format('M d, Y H:i'),
            ]);
    }

}
