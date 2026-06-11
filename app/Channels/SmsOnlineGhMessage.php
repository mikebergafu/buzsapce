<?php

namespace App\Channels;

class SmsOnlineGhMessage
{
    public function __construct(
        public string $content,
        public ?string $sender = null,
    ) {}
}
