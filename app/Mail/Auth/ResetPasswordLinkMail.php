<?php
namespace App\Mail\Auth;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordLinkMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public string $resetUrl;

    public function __construct(User $user, string $resetUrl)
    {
        $this->user     = $user;
        $this->resetUrl = $resetUrl;
    }

    public function build()
    {
        return $this->subject('Reset your password')
            ->view('emails.auth.reset_password_link')
            ->with([
                'resetUrl'   => $this->resetUrl,
                'ttl'        => 60,                                            
                'logoUrl'    => config('app.url') . '/assets/img/logo/logo.png', 
                'supportUrl' => config('app.url') . '/support',
                'sentAt'     => now()->format('M d, Y H:i'),
                'appName'    => config('app.name', 'Laravel'),
            ]);

    }
}
