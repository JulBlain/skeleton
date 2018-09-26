<?php
/**
 * Created by PhpStorm.
 * User: dieu
 * Date: 26/09/18
 * Time: 15:45
 */

namespace App\UI\Action;

use App\UI\Action\Interfaces\HomeActionInterface;
use App\UI\Action\Responder\HomeResponder;
use App\UI\Responder\Interfaces\HomeResponderInterface;

/**
 * Class HomeAction
 * @Route(
 *     path="/"
 * )
 */

class HomeAction implements HomeActionInterface
{
    public function __invoke(HomeResponderInterface $responder)
    {
        return $responder();
    }
}
