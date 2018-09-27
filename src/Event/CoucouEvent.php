<?php
/**
 * Created by PhpStorm.
 * User: dieu
 * Date: 27/09/18
 * Time: 15:51
 */

namespace App\Event;

use Symfony\Component\EventDispatcher\Event;

class CoucouEvent extends Event
{
    const NAME = 'coucou.event';

    public function sayHello() {
        echo 'Hello biye';
    }

}