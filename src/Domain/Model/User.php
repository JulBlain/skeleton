<?php
/**
 * Created by PhpStorm.
 * User: dieu
 * Date: 27/09/18
 * Time: 18:30
 */

namespace App\Domain\Model;


class User
{
    private $username;
    private $mail;
    private $roles;

    public  function __construct(
        string $username,
        string $mail
    )
    {
        $this->username = $username;
        $this->mail = $mail;
        $this->roles[] = 'ROLE_USER';
    }

}