<?php

namespace App\Notifications;

use App\Models\PurchasedNetApp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifySellerAboutPurchasedNetApp extends Notification implements ShouldQueue {
    use Queueable;

    protected $purchasedNetapp;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(PurchasedNetApp $purchasedNetapp) {
        $this->purchasedNetapp = $purchasedNetapp;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable) {
        return ['mail'];
    }

    /**
     * Determine which queues should be used for each notification channel.
     *
     * @return array
     */
    public function viaQueues() {
        return [
            'mail' => 'mail-queue',
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) {
        return (new MailMessage)
            ->subject('Your evolved-5G netapp has been purchased!')
            ->line('Congratulations, the Evolved-5G user with email ' .
                $this->purchasedNetapp->user->email
                . ' has purchased your Network App: <a href="' . route('show-netapp', ['slug' => $this->purchasedNetapp->netapp->slug])
                . '" target="_blank">' . $this->purchasedNetapp->netapp->name . '</a>')
            ->line("Go to your dashboard to see it:")
            ->action('Visit your dashboard', route('welcome-dashboard'))
            ->line('Thank you for using Evolved-5G Marketplace!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable) {
        return [
            //
        ];
    }
}
