<?php
/**
 * Created by PhpStorm.
 * User: dieu
 * Date: 02/10/18
 * Time: 17:10
 */

namespace App\Form\Handler\Interfaces;


use Symfony\Component\Form\FormInterface;

interface AddArticleTypeHandlerInterface
{
    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool;


}