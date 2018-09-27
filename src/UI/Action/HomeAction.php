<?php
/**
 * Created by PhpStorm.
 * User: dieu
 * Date: 26/09/18
 * Time: 15:45
 */

namespace App\UI\Action;

use App\Domain\Model\User;
use App\Event\CoucouEvent;
use App\Event\UserCreatedEvent;
use App\Helper\FileUploaderHelper;
use App\Listener\UserCreatedListener;
use App\UI\Action\Interfaces\HomeActionInterface;

use App\UI\Responder\Interfaces\HomeResponderInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Routing\Annotation\Route;



/**
 * Class HomeAction
 *
 * @Route(
 *     path="/")
 */

class HomeAction implements HomeActionInterface
{

    private $eventDispatcher;

    private $fileUploaderHelper;

    public function __construct(EventDispatcherInterface $eventDispatcher,FileUploaderHelper $fileUploaderHelper)
    {
        $this->eventDispatcher = $eventDispatcher;
        $this->fileUploaderHelper = $fileUploaderHelper;
    }


    public function __invoke(HomeResponderInterface $responder)
    {
        $user = new User('toto', 'toto@gmail.com');


        $this->eventDispatcher->dispatch(UserCreatedEvent::NAME, new UserCreatedEvent($user));

       var_dump($this->fileUploaderHelper->getImageFolder());
        return $responder();
    }
}
