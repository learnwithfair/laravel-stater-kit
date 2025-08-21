<?php
namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmployeeResetPasswordNotification extends Notification {
    public $token;

    public function __construct( $token ) {
        $this->token = $token;
    }

    public function via( $notifiable ) {
        return ['mail']; // Ensure it sends the email immediately
    }

    public function toMail( $notifiable ) {
        $resetUrl = config( 'app.url' ) . '/employee-reset-password/' . $this->token . '?email=' . urlencode( $notifiable->email );

        return ( new MailMessage )
            ->subject( 'Reset Your Password' )
            ->greeting( 'Hello ' . $notifiable->name . ',' )
            ->line( 'You requested a password reset for your employee account.' )
            ->action( 'Reset Password', $resetUrl )
            ->line( 'If you did not request this, please ignore this email.' )
            ->line( 'Thank you for being a part of our team!' )
            ->salutation( 'Best Regards, HR Community' );
    }
}