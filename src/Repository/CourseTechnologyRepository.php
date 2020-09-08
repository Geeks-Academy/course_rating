<?php

namespace App\Repository;

use App\Entity\CourseTechnology;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CourseTechnology|null find($id, $lockMode = null, $lockVersion = null)
 * @method CourseTechnology|null findOneBy(array $criteria, array $orderBy = null)
 * @method CourseTechnology[]    findAll()
 * @method CourseTechnology[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CourseTechnologyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CourseTechnology::class);
    }

    // /**
    //  * @return CourseTechnology[] Returns an array of CourseTechnology objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CourseTechnology
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
