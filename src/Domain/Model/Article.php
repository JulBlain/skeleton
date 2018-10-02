<?php
/**
 * Created by PhpStorm.
 * User: dieu
 * Date: 02/10/18
 * Time: 18:21
 */

namespace App\Domain\Model;


class Article
{
    /**
     * @var string
     */
    private $content;

    /**
     * Article constructor.
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }


}