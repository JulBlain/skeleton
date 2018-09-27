<?php
/**
 * Created by PhpStorm.
 * User: dieu
 * Date: 27/09/18
 * Time: 18:41
 */

namespace App\Listener;


use App\Event\UserCreatedEvent;

class UserCreatedListener
{
    public function onUserCreated(UserCreatedEvent $event) {
        var_dump($event->getUser());
    }
}