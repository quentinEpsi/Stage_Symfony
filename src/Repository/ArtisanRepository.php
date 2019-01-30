<?php

namespace App\Repository;

use App\Entity\Artisan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Artisan|null find($id, $lockMode = null, $lockVersion = null)
 * @method Artisan|null findOneBy(array $criteria, array $orderBy = null)
 * @method Artisan[]    findAll()
 * @method Artisan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArtisanRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Artisan::class);
    }

    /**
     * @param $idArtisan
     * @return Artisan[] Returns an array of Artisan objects
     */

    public function findByField($idArtisan)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.idArtisan = :idArtisan')
            ->setParameter('val', $idArtisan)
            ->orderBy('a.idArtisan', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }


    public function findOneBySomeField($idArtisan): ?Artisan
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :idArtisan')
            ->setParameter('idArtisan', $idArtisan)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
