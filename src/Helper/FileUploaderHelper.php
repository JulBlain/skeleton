<?php
/**
 * Created by PhpStorm.
 * User: dieu
 * Date: 27/09/18
 * Time: 14:26
 */

namespace App\Helper;


class FileUploaderHelper
{
    private $imageFolder;

    public function __construct(string $imageFolder)
    {
        $this->imageFolder = $imageFolder;
    }

    public function getImageFolder(): string {
        return $this->imageFolder;
    }


}