<?php

namespace App\Repository;

use App\Entity\Bike;
use App\Model\SearchData;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Bike>
 *
 * @method Bike|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bike|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bike[]    findAll()
 * @method Bike[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BikeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bike::class);
    }
    
    public function findBySearch(SearchData $searchData): array
    {
        $data = $this->createQueryBuilder('b');             // To create the query
        // dd($data);
        if (!empty($searchData->q)) {
            $data = $data
                ->orWhere('b.nameBike LIKE :q')             //Equivalent to SQL : WHERE b.nameBike LIKE :q <-- marker
                ->setParameter('q', "%{$searchData->q}%");  //Bind the marker with the variable value 
                                                            //Security to prevent SQL injection
        }

        $data = $data
            ->getQuery()                                                        
            ->getResult();                                  //Retrieves the entire request
        return $data;                                       //Return the result

    }
//    /**
//     * @return Bike[] Returns an array of Bike objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Bike
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
