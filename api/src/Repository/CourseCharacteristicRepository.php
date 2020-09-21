<?php

namespace App\Repository;

use App\Entity\CourseCharacteristic;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CourseCharacteristic|null find($id, $lockMode = null, $lockVersion = null)
 * @method CourseCharacteristic|null findOneBy(array $criteria, array $orderBy = null)
 * @method CourseCharacteristic[]    findAll()
 * @method CourseCharacteristic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CourseCharacteristicRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CourseCharacteristic::class);
    }

    /**
     * @param bool $enabledOnly determines whether it should return only enabled course characteristics
     * @return CourseCharacteristic[]
     */
    public function findCourseCharacteristics(bool $enabledOnly = true)
    {
        $qb = $this->createQueryBuilder('cc');

        $qb->select('cc');

        if ($enabledOnly) {
            $qb->where('cc.isEnabled = true');
        }

        return $qb->getQuery()->getResult();
    }

    // /**
    //  * @return CourseCharacteristic[] Returns an array of CourseCharacteristic objects
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
    public function findOneBySomeField($value): ?CourseCharacteristic
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
