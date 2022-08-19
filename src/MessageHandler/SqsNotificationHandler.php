<?php

namespace App\MessageHandler;

use App\Message\SqsNotification;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class SqsNotificationHandler
{
    public function __invoke(SqsNotification $message)
    {
        
    }
}