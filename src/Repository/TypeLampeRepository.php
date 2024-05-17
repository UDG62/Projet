<?php

namespace App\Repository;

use App\Entity\TypeLampe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeLampe>
 *
 * @method TypeLampe|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeLampe|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeLampe[]    findAll()
 * @method TypeLampe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeLampeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeLampe::class);
    }

    //    /**
    //     * @return TypeLampe[] Returns an array of TypeLampe objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('t.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?TypeLampe
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
