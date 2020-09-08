<?php

namespace App\Repository;

use App\Entity\CourseRatingCriterion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CourseRatingCriterion|null find($id, $lockMode = null, $lockVersion = null)
 * @method CourseRatingCriterion|null findOneBy(array $criteria, array $orderBy = null)
 * @method CourseRatingCriterion[]    findAll()
 * @method CourseRatingCriterion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CourseRatingCriterionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CourseRatingCriterion::class);
    }

    // /**
    //  * @return CourseRatingCriterion[] Returns an array of CourseRatingCriterion objects
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
    public function findOneBySomeField($value): ?CourseRatingCriterion
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
