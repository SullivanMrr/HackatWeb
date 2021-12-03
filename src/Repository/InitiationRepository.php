<?php

namespace App\Repository;

use App\Entity\Initiation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Initiation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Initiation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Initiation[]    findAll()
 * @method Initiation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InitiationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Initiation::class);
    }

    // /**
    //  * @return Initiation[] Returns an array of Initiation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Initiation
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
