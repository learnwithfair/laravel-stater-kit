<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class OtpCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $code,
        public int $ttlMinutes,
        public string $title = 'Verification Code'
    ) {}
    public function build()
    {
        $logo = cache()->remember('system_logo', 3600, function () {
            return DB::table('system_settings')->value('logo');
        });
        $logoUrl = $logo ? url($logo) : url('/assets/img/logo/logo.png');

        return $this->subject("{$this->title}: {$this->code}")
            ->view('emails.otp')
            ->with([
                'code'       => $this->code,
                'ttl'        => $this->ttlMinutes,
                'supportUrl' => config('app.url') . '/support',
                'logoUrl'    => $logoUrl,
                'appName'    => config('app.name', 'Laravel'),
                'sentAt'     => now()->format('M d, Y H:i'),
            ]);
    }
}
