<?php

namespace App\Repository;

use App\Entity\Choisir;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Choisir|null find($id, $lockMode = null, $lockVersion = null)
 * @method Choisir|null findOneBy(array $criteria, array $orderBy = null)
 * @method Choisir[]    findAll()
 * @method Choisir[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChoisirRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Choisir::class);
    }
	
	// /**
	
    //  * @return Chosisir Returns the Choisir object
    //  */
    public function findleChoix($idCli, $idArt)
    {
        return $this->createQueryBuilder('choix')
            ->andWhere('choix.idArtisan = :Id_artisan')
            ->andWhere('choix.idClient = :Id_client')
            ->setParameter('Id_artisan', $idArt)
            ->setParameter('Id_client', $idCli)
            ->getQuery()
            ->getResult()
            ;
    }
    
}
