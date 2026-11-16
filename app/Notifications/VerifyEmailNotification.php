<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyEmailNotification extends VerifyEmail
{
    public function toMail($notifiable)
    {
        // Generamos la URL de verificación firmada de Laravel
        $verificationUrl = $this->verificationUrl($notifiable);

        // Retornamos una vista personalizada
        return (new MailMessage)
            ->subject('Verifica tu cuenta en DOMI 🎓')
            ->view('emails.verify', [
                'url' => $verificationUrl,
                'user' => $notifiable
            ]);
    }
}