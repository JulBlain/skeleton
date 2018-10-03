<?php
/**
 * Created by PhpStorm.
 * User: dieu
 * Date: 03/10/18
 * Time: 18:41
 */

namespace App\UI\Action;


use App\Domain\Builder\UserBuilder;
use App\Domain\Model\User;
use App\Form\Type\RegisterType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Twig\Environment;

/**
 * Class RegistrationAction
 * @package App\UI\Action
 * @Route(
 *     path="/register",
 *     name="register"
 * )
 */


class RegistrationAction
{



    /**
     * @var EncoderFactoryInterface
     */
    private $encoderFactory;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var UserBuilder
     */
    private $userBuilder;

    //degueu mais flemme de faire un responder
    /**
     * @var Environment
     */
    private $twig;

    /**
     * RegistrationAction constructor.
     * @param EncoderFactoryInterface $encoderFactory
     * @param FormFactoryInterface $formFactory
     * @param UserBuilder $userBuilder
     * @param Environment $twig
     */
    public function __construct(EncoderFactoryInterface $encoderFactory, FormFactoryInterface $formFactory, UserBuilder $userBuilder, Environment $twig)
    {
        $this->encoderFactory = $encoderFactory;
        $this->formFactory = $formFactory;
        $this->userBuilder = $userBuilder;
        $this->twig = $twig;
    }


    public function __invoke(Request $request)
    {
        $form = $this->formFactory->create(RegisterType::class)->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {


            //recuperation de l'encoder, la class est celle definit dans security.yml
            $encoder = $this->encoderFactory->getEncoder(User::class);

            //definit dans notre builer
            $user = $this->userBuilder->createFromRegistration('toto', 'tot@gmail.com', '1eldkdk', \Closure::fromCallable([$encoder, 'encodePassword']));

            dump($this->userBuilder->getUser());
            die();
        }

        return new Response(
            $this->twig->render('register.html.twig', [
                'form' => $form->createView()
            ])
        );



    }


}