<?php

namespace DiDemo\Mailer;

interface MailerInterface
{
    public function sendMessage(
        string $recipientEmail,
        string $subject,
        string $message,
        string $from,
    ): void;
}
