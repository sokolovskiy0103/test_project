<?php

namespace App\Controller;

use app\Message\SqsNotification;
use App\Messenger\Serializer\SQSNotificationSerializer;
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
    * @Route("/send")
    */
    public function index(MessageBusInterface $bus)
    {
        
        $notification = new SqsNotification('NEW TEST SQS MESSAGE!');
        dump($notification);
        $bus->dispatch($notification);
             
        return $this->render('index.html.twig');
              
    }
}
