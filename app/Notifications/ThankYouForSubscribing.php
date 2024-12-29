<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ThankYouForSubscribing extends Notification
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Cảm ơn bạn đã đăng ký nhận bản tin!')
                    ->line('Cảm ơn bạn đã đăng ký nhận bản tin từ chúng tôi!')
                    ->line('Chúng tôi sẽ gửi đến bạn những thông tin hữu ích về các thiết bị điện tử mới mất.')
                    ->action('Truy cập Website', url('/'))
                    ->line('Cảm ơn bạn đã tham gia!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            // Chỉ định các thông tin cần thiết cho notification ở đây nếu cần
        ];
    }
}
