<?php

namespace App\Tests\UI\Action;

use App\Form\Handler\Interfaces\AddArticleTypeHandlerInterface;
use App\Helper\FileUploaderHelper;
use App\UI\Action\HomeAction;
use App\UI\Action\Interfaces\HomeActionInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;

class HomeActionTest extends KernelTestCase
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
    private $fileUploader;

    /**
     * @var AddArticleTypeHandlerInterface
     */
    private $addArticleTypeHandler;

    public function setUp() {

        static::bootKernel();
        /*
         * donne les services directement tt pret
         */
        $this->formFactory = static::$kernel->getContainer()->get('form.factory');
        $this->eventDispatcher = static::$kernel->getContainer()->get('event_dispatcher');

        /*
         * on cree un mock
         */
        $this->addArticleTypeHandler = $this->createMock(AddArticleTypeHandlerInterface::class);
        $this->addArticleTypeHandler->method('handle')->willReturn(false);

        $this->fileUploader = $this->createMock(FileUploaderHelper::class);
        $this->fileUploader->method('getImageFolder')->willReturn('./public/images');
    }

    public function testConstruct() {
        $homeAction = new HomeAction(
            $this->formFactory,
            $this->eventDispatcher,
            $this->fileUploader,
            $this->addArticleTypeHandler
        );

        /*
         * verifie que c'est bien un objet, que c bien une instance de la classe, et là que c bien une instance d'une interface
         */
        static::assertInstanceOf(
            HomeActionInterface::class,
            $homeAction
        );
    }
}