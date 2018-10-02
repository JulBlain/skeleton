<?php
/**
 * Created by PhpStorm.
 * User: dieu
 * Date: 02/10/18
 * Time: 16:55
 */

namespace App\Form\Handler;


use App\Form\Handler\Interfaces\AddArticleTypeHandlerInterface;
use Symfony\Component\Form\FormInterface;

class AddArticleTypeHandler implements AddArticleTypeHandlerInterface
{
    public function handle(FormInterface $form): bool {

        if ($form->isSubmitted() && $form->isValid()) {
            dump($form->getData());
            die();
            $data = $form->getData(); //instance DTO deja hydraté
            return true;
        }

        return false;
    }
}