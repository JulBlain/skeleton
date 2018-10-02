<?php
/**
 * Created by PhpStorm.
 * User: dieu
 * Date: 26/09/18
 * Time: 17:06
 */

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\HomeResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
    public function __invoke($redirect =false, FormInterface $addArticleType = null)
    {
        $redirect
            ? $response = new RedirectResponse('/')
            : $response = new Response(
                $this->twig->render('index.html.twig',[
            'form' => $addArticleType->createView()
        ])
    );
        return $response;
    }
}