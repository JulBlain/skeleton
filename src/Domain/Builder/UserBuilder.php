<?php
/**
 * Created by PhpStorm.
 * User: dieu
 * Date: 03/10/18
 * Time: 18:27
 */

namespace App\Domain\Builder;


use App\Domain\Model\User;

class UserBuilder
{
    private $user;

    public function createFromRegistration(string $username, string $email, string $password, callable $passwordEncoder): self {
        //pattern fluent

        $this->user = new User($username, $email, $password, $passwordEncoder);
        return $this;
    }

    public function getUser() {
        return $this->user;
    }
}