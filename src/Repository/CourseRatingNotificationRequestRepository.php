<?php

namespace App\Repository;

use App\Entity\CourseRatingNotificationRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CourseRatingNotificationRequest|null find($id, $lockMode = null, $lockVersion = null)
 * @method CourseRatingNotificationRequest|null findOneBy(array $criteria, array $orderBy = null)
 * @method CourseRatingNotificationRequest[]    findAll()
 * @method CourseRatingNotificationRequest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CourseRatingNotificationRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CourseRatingNotificationRequest::class);
    }

    // /**
    //  * @return CourseRatingNotificationRequest[] Returns an array of CourseRatingNotificationRequest objects
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
    public function findOneBySomeField($value): ?CourseRatingNotificationRequest
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
