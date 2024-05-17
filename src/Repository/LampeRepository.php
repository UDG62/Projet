<?php

namespace App\Repository;

use App\Entity\Lampe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Lampe>
 *
 * @method Lampe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lampe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lampe[]    findAll()
 * @method Lampe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LampeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lampe::class);
    }

    //    /**
    //     * @return Lampe[] Returns an array of Lampe objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('l.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Lampe
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
