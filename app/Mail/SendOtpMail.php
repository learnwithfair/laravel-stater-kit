<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOtpMail extends Mailable {
    use Queueable, SerializesModels;

    public $otp;
    public $type;

    public function __construct( $otp, $type = 'register' ) {
        $this->otp = $otp;
        $this->type = $type;
    }

    public function build() {
        $subject = match ( $this->type ) {
            'login'           => 'Your Login OTP',
            'forgot_password' => 'Reset Your Password - OTP',
            default           => 'Verify Your Email',
        };

        $view = match ( $this->type ) {
            'login'           => 'emails.login_otp',
            'forgot_password' => 'emails.forgot_password_otp',
            default           => 'emails.registration_otp',
        };

        return $this->subject( $subject )
            ->view( $view );
    }
}