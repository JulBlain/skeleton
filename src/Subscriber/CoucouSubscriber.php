<?php
/**
 * Created by PhpStorm.
 * User: dieu
 * Date: 27/09/18
 * Time: 16:11
 */

namespace App\Subscriber;


use App\Event\CoucouEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;

class CoucouSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        // TODO: Implement getSubscribedEvents() method.
        return [
            CoucouEvent::NAME => 'onCoucou'
        ];
    }

    public function onCoucou(CoucouEvent $event) {
        return new Response(
            $event->sayHello()
        );
    }
}