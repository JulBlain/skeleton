<?php
/**
 * Created by PhpStorm.
 * User: dieu
 * Date: 02/10/18
 * Time: 18:18
 */

namespace App\Domain\DTO;


class NewArticleDTO
{
    /**
     * @var string
     */
    public $content;

    /**
     * @var string
     */
    public $title;

    /**
     * NewArticleDTO constructor.
     * @param string $content
     * @param string $title
     */
    public function __construct(string $content, string $title=null)
    {
        $this->content = $content;
        $this->title = $title;
    }


}