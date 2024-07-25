<?php

namespace App\Repository;

use App\Entity\Review;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NoResultException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Review>
 */
class ReviewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Review::class);
    }

    //    /**
    //     * @return Review[] Returns an array of Review objects
    //     */
       public function getAverageRateForMovieId($movieId): float
       {

        try{
           $result =  $this->createQueryBuilder('r')
           ->select('AVG(r.rate) as averageRate')
                ->Where('r.movie = :movieId')
               ->setParameter('movieId', $movieId)
                ->getQuery()
                ->getSingleScalarResult();

            return $result !== null ? (float) $result : 0.0;
            

         } catch (NoResultException $e){
            return 0.0;
         }
        }

    //    public function findOneBySomeField($value): ?Review
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
