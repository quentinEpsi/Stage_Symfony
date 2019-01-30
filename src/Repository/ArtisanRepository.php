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
     * @param $id
     * @return array|artisan[]
     * @throws \Doctrine\ORM\NonUniqueResultException
     */

    public function findOneByIdJoined($id)
    {
        return $this->createQueryBuilder('a')
            ->innerJoin('a.idClient', 'i')
            ->addSelect('i')
            ->andWhere('a.idArtisan = :idArtisan')
            ->setParameter('idArtisan', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findOneByIdJoinedQuery()
    {
        $this->getEntityManager()->createQuery('SELECT * FROM Artisan a, Client c WHERE a.idClient = c.idClient');
        return array($this);
    }
}
