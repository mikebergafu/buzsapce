<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SmsOnlineGhChannel
{
    /**
     * Send the given notification.
     */
    public function send(object $notifiable, Notification $notification): void
    {
        /** @var SmsOnlineGhMessage $message */
        $message = $notification->toSmsOnlineGh($notifiable);

        $to = $notifiable->routeNotificationFor('sms_online_gh', $notification);

        if (! $to) {
            return;
        }

        $response = Http::withHeaders([
            'Authorization' => 'key ' . config('services.sms_online_gh.api_key'),
        ])->post(config('services.sms_online_gh.base_url') . '/v4/message/sms/send', [
            'messages' => [
                [
                    'text' => $message->content,
                    'type' => 0,
                    'sender' => $message->sender ?? config('services.sms_online_gh.sender_id'),
                    'destinations' => [['to' => $to]],
                ],
            ],
        ]);

        if ($response->failed()) {
            Log::error('SmsOnlineGH: Failed to send SMS', [
                'to' => $to,
                'status' => $response->status(),
                'body' => $response->body(),
            ]);
        }
    }
}
