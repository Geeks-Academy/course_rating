<?php

namespace App\Repository;

use App\Entity\CourseRatingState;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CourseRatingState|null find($id, $lockMode = null, $lockVersion = null)
 * @method CourseRatingState|null findOneBy(array $criteria, array $orderBy = null)
 * @method CourseRatingState[]    findAll()
 * @method CourseRatingState[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class CourseRatingStateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CourseRatingState::class);
    }

    // /**
    //  * @return CourseRatingStates[] Returns an array of CourseRatingStates objects
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
    public function findOneBySomeField($value): ?CourseRatingStates
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
