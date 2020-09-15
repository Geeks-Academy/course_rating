<?php

namespace App\Repository;

use App\Entity\CourseRatingCriterionReference;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CourseRatingCriterionReference|null find($id, $lockMode = null, $lockVersion = null)
 * @method CourseRatingCriterionReference|null findOneBy(array $criteria, array $orderBy = null)
 * @method CourseRatingCriterionReference[]    findAll()
 * @method CourseRatingCriterionReference[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CourseRatingCriterionReferenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CourseRatingCriterionReference::class);
    }

    // /**
    //  * @return CourseRatingCriterionReference[] Returns an array of CourseRatingCriterionReference objects
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
    public function findOneBySomeField($value): ?CourseRatingCriterionReference
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
