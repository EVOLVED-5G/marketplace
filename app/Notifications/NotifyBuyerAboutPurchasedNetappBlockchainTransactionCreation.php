<?php

namespace App\Notifications;

use App\Models\PurchasedNetapp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyBuyerAboutPurchasedNetappBlockchainTransactionCreation extends Notification implements ShouldQueue
{
    use Queueable;
    protected $purchasedNetapp;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(PurchasedNetapp $purchasedNetapp)
    {
        $this->purchasedNetapp = $purchasedNetapp;
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
     * @return MailMessage
     */
    public function toMail($notifiable) {
        return (new MailMessage)
            ->subject('Your purchase receipt is now available on ETH blockchain')
            ->line('Everytime you purchase a net-app via the Evolved-5G marketplace, a digital signature of this purchase is stored in the ETH blockchain.')
            ->line("Go to your dashboard to view the blockchain transaction:")
            ->action('Visit your dashboard', route('welcome-dashboard'))
            ->line('Thank you for using Evolved-5G Marketplace!');
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
