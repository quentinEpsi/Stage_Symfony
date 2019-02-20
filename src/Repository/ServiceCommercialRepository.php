<?php

namespace App\Repository;

use App\Entity\ServiceCommercial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ServiceCommercial|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceCommercial|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceCommercial[]    findAll()
 * @method ServiceCommercial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceCommercialRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ServiceCommercial::class);
    }

    // /**
    //  * @return ServiceCommercial[] Returns an array of ServiceCommercial objects
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
    public function findOneBySomeField($value): ?ServiceCommercial
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
