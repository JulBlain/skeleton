<?php
/**
 * Created by PhpStorm.
 * User: dieu
 * Date: 03/10/18
 * Time: 15:23
 */

namespace App\Repository;


use App\Domain\Model\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;

class UserRespository extends ServiceEntityRepository implements UserLoaderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function loadUserByUsername($username)
    {
        return $this->createQueryBuilder('user')
                    ->where('user.username = :username OR user.phoneNumber = :phoneNumber')
                    ->setParameter('username', $username)
                    ->setParameter('phoneNumber', $username)
                    ->getQuery()
                    ->getOneOrNullResult();
    }

}