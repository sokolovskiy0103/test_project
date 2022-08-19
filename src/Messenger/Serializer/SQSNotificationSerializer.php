<?php

namespace App\Messenger\Serializer;
use app\Message\SqsNotification;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Transport\Serialization\SerializerInterface;



class SQSNotificationSerializer implements SerializerInterface
{
    


    /**
     * @throws \LogicException
     */
    public function decode(array $encodedEnvelope): Envelope
    {
        throw new \LogicException('Transport & serializer not meant for receiving messages.');
    }

    public function encode(Envelope $envelope): array
    {
              
        $message = [$envelope->getMessage()];
        return ["123"];
    }

   
}
