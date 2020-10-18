<?php

namespace App\Repository;

use App\Entity\Mensajero;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Mensajero|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mensajero|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mensajero[]    findAll()
 * @method Mensajero[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MensajeroRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mensajero::class);
    }

    // /**
    //  * @return Mensajero[] Returns an array of Mensajero objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Mensajero
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
