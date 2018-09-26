<?php
/**
 * Created by PhpStorm.
 * User: dieu
 * Date: 26/09/18
 * Time: 16:54
 */

namespace App\Controller\Interfaces;


use Twig\Environment;

interface DefaultControllerInterface
{
    public function __invoke(Environment $twig);
}