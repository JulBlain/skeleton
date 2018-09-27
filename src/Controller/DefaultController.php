<?php
/**
 * Created by PhpStorm.
 * User: dieu
 * Date: 24/09/18
 * Time: 17:33
 */

namespace App\Controller;


use App\Controller\Interfaces\DefaultControllerInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;


class DefaultController implements DefaultControllerInterface
{
    public function __invoke(Environment $environment)
    {
        return new Response(
            $environment->render('index.html.twig')
        );
    }

}