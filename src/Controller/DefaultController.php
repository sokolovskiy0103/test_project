<?php

namespace App\Controller;

use App\Entity\SQSMessage;
use App\Entity\Task;
use app\Message\SqsNotification;
use App\Messenger\Serializer\SQSNotificationSerializer;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Stamp\SerializerStamp;

class DefaultController extends AbstractController
{
    /**
    * @Route("/send/{message}")
    */
    public function index(MessageBusInterface $bus, ManagerRegistry $doctrine, $message)
    {
        
        $notification = new SqsNotification($message);
        $bus->dispatch($notification);
        return $this->render('index.html.twig');
              
    }
}
