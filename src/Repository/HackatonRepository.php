<?php

namespace App\Repository;

use App\Entity\Hackathon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Hackathon|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hackathon|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hackathon[]    findAll()
 * @method Hackathon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HackatonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hackathon::class);
    }

    public function distinctVille(){
        $query = $this->createQueryBuilder('h')
        ->select('h.ville')
        ->groupBy('h.ville')
        ->getQuery()
        ;
        $distinct = $query->getResult();
        return $distinct;
    }

    public function getParticiperHackathon($id){
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT h from App\entity\Hackathon h JOIN App\Entity\Participer p WITH p.idHackathon = h.idHackathon WHERE p.idParticipant = :id')
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
