<?php

namespace App\Repository;

use App\Entity\OrderBike;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OrderBike>
 *
 * @method OrderBike|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderBike|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderBike[]    findAll()
 * @method OrderBike[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderBikeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrderBike::class);
    }

//    /**
//     * @return OrderBike[] Returns an array of OrderBike objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OrderBike
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
