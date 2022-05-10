<?php

namespace App\Repository;

use App\Entity\HackathonFavoris;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @method Hackathon|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hackathon|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hackathon[]    findAll()
 * @method Hackathon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HackathonFavorisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HackathonFavoris::class);
    }

    public function getFavoris($id){
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT h from App\entity\Hackathon h JOIN App\Entity\HackathonFavoris hf WITH hf.idHackathon = h.idHackathon WHERE hf.idParticipant = :id')
        ->setParameter('id', $id);
        $participer = $query->getResult();
        return $participer;
    }

    // /**
    //  * @return Hackathon[] Returns an array of Hackathon objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
   
    /*
    public function findOneBySomeField($value): ?Hackathon
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
