<?php

namespace App\Repository;

use App\Entity\Rentable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Rentable|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rentable|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rentable[]    findAll()
 * @method Rentable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RentableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rentable::class);
    }

    // /**
    //  * @return Rentable[] Returns an array of Rentable objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Rentable
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
