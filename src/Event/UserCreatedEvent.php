<?php
/**
 * Created by PhpStorm.
 * User: dieu
 * Date: 27/09/18
 * Time: 18:38
 */

namespace App\Event;


use App\Domain\Model\User;
use Symfony\Component\EventDispatcher\Event;

class UserCreatedEvent extends Event
{
    const NAME = 'user.created';

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser(): User {
        return $this->user;
    }
}