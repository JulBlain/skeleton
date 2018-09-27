<?php
/**
 * Created by PhpStorm.
 * User: dieu
 * Date: 26/09/18
 * Time: 17:06
 */

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\HomeResponderInterface;

use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;

class HomeResponder implements HomeResponderInterface
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    //dans invoke on injecte que la requete, a la rigueur la rep mais jamais autre chose
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
        return new Response(
            $this->twig->render('index.html.twig')
        );
    }
}