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
use App\Form\Handler\AddArticleTypeHandler;
use App\Form\Handler\Interfaces\AddArticleTypeHandlerInterface;
use App\Form\Type\AddArticleType;
use App\Helper\FileUploaderHelper;
use App\Listener\UserCreatedListener;
use App\UI\Action\Interfaces\HomeActionInterface;

use App\UI\Responder\Interfaces\HomeResponderInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



/**
 * Class HomeAction
 *
 * @Route(
 *     path="/")
 */

class HomeAction implements HomeActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var FileUploaderHelper
     */
    private $fileUploaderHelper;


    /**
     * @var AddArticleTypeHandlerInterface
     */
    private $addArticleTypeHandler;

    /**
     * HomeAction constructor.
     * @param FormFactoryInterface $formFactory
     * @param EventDispatcherInterface $eventDispatcher
     * @param FileUploaderHelper $fileUploaderHelper
     * @param AddArticleTypeHandlerInterface $addArticleTypeHandler
     */
    public function __construct(FormFactoryInterface $formFactory, EventDispatcherInterface $eventDispatcher, FileUploaderHelper $fileUploaderHelper, AddArticleTypeHandlerInterface $addArticleTypeHandler)
    {
        $this->formFactory = $formFactory;
        $this->eventDispatcher = $eventDispatcher;
        $this->fileUploaderHelper = $fileUploaderHelper;
        $this->addArticleTypeHandler = $addArticleTypeHandler;
    }


    public function __invoke(Request $request, HomeResponderInterface $responder)
    {
        $addArticleType = $this->formFactory->create(AddArticleType::class)
                                            ->handleRequest($request);

        if ($this->addArticleTypeHandler->handle($addArticleType)) {
            //....
            return $responder(true);
        }


        return $responder(false, $addArticleType);
    }
}
