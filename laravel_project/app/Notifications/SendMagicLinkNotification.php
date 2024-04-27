<?php

namespace App\Notifications;

use App\Models\Doctorant;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Grosv\LaravelPasswordlessLogin\LoginUrl;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Enseignant;

class SendMagicLinkNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $doctorant = Doctorant::where('email', $notifiable->email)->first();

        $enseignant = Enseignant::where('email', $notifiable->email)->first();

        $redirectUrl = '/bienvenue';

        if ($doctorant) {
            $redirectUrl = '/dashboard/view/welcome';
        } elseif ($enseignant) {
            $redirectUrl = '/dashboard-ens/view/welcome';
        }

        $generator = new LoginUrl($notifiable);
        $generator->setRedirectUrl($redirectUrl);
        $url = $generator->generate();

        return (new MailMessage)
                    ->subject('Your Login Magic Link!')
                    ->line('Click this link to log in!')
                    ->action('Login', $url)
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
