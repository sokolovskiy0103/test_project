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

        return new Envelope(new SqsNotification($encodedEnvelope['body']));

    }

    public function encode(Envelope $envelope): array
    {
              
        $message = $envelope->getMessage()->getContent();
        $message = $message . "teeeest";
        return ['body' => $message];
    }

   
}
