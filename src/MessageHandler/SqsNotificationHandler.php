<?php

namespace App\MessageHandler;

use App\Message\SqsNotification;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class SqsNotificationHandler
{
    public function __invoke(SqsNotification $message)
    {
        file_put_contents("test_output.txt",$message->getContent() . "\n",FILE_APPEND);
    }
}