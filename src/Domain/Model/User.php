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
    private $email;
    private $roles;
    private $creationDate;
    private $password;

    public  function __construct(
        string $username,
        string $mail,
        string $password,
        callable $passwordEncoder
    )
    {
        $this->username = $username;
        $this->email = $mail;
        $this->password = $passwordEncoder($password, null);
        $this->roles[] = 'ROLE_USER';
        $this->creationDate =time();

    }

}