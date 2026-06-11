<?php

namespace App\Notifications;

use App\Channels\SmsOnlineGhChannel;
use App\Channels\SmsOnlineGhMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendVerificationCode extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public readonly string $code,
        public readonly string $channel = 'mail',
    ) {}

    /**
     * @return list<string|class-string>
     */
    public function via(object $notifiable): array
    {
        if ($this->channel === 'sms') {
            return [SmsOnlineGhChannel::class];
        }

        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Your Verification Code')
            ->line("Your verification code is: **{$this->code}**")
            ->line('This code expires in 10 minutes.');
    }

    public function toSmsOnlineGh(object $notifiable): SmsOnlineGhMessage
    {
        $hash = config('services.sms_online_gh.app_hash', '');

        return new SmsOnlineGhMessage(
            content: "<#> Your BuzSpace code is: {$this->code}. Expires in 10 minutes.\n{$hash}",
        );
    }
}
