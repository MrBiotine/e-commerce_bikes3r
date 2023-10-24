<?php

namespace App\Repository;

use App\Entity\OrderCustomer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OrderCustomer>
 *
 * @method OrderCustomer|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderCustomer|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderCustomer[]    findAll()
 * @method OrderCustomer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderCustomerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrderCustomer::class);
    }

//    /**
//     * @return OrderCustomer[] Returns an array of OrderCustomer objects
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

//    public function findOneBySomeField($value): ?OrderCustomer
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
