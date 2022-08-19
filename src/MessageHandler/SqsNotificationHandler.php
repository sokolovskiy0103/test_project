<?php

namespace App\MessageHandler;


use App\Entity\SQSMessage;
use App\Message\SqsNotification;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;


#[AsMessageHandler]
class SqsNotificationHandler
{
    private ObjectManager $entityManager;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->entityManager = $managerRegistry->getManager();
    }


    public function __invoke(SqsNotification $message): void
    {
        $sqsMessage = new SQSMessage();
        $sqsMessage->setBody($message->getContent());
        $sqsMessage->setRecievedAt(new DateTime());

        $this->entityManager->persist($sqsMessage);
        $this->entityManager->flush();

        file_put_contents('test_output.txt',$message->getContent() . "\n", FILE_APPEND);

    }
}
