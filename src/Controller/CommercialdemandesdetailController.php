<?php

namespace App\Controller;

use App\Entity\Artisan;
use App\Entity\Client;
use App\Repository\ArtisanRepository;
use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommercialdemandesdetailController extends AbstractController
{
    /**
     * @Route("/commercial/commercialdemandesdetail/{id}", name="commercialdemandesdetail")
     * @param ClientRepository $repo
     * @param Client $idClient
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ClientRepository $repo, Client $idClient)
    {
        $clients = $repo->find($idClient);
        return $this->render('commercial/commercialdemandesdetail/index.html.twig', [
            'controller_name' => 'CommercialdemandesdetailController',
            'clients' => $clients
        ]);
    }

    /**
     * @Route("/commercial/commercialdemandesdetail/{id}", name="commercialdemandesdetail")
     * @param ArtisanRepository $artisanRepository
     * @param Client $idClient
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function show(ArtisanRepository $artisanRepository, Client $idClient)
    {
        $clients = $artisanRepository->find($idClient);
        return $this->render('commercial/commercialdemandesdetail/index.html.twig', [
            'controller_name' => 'CommercialdemandesdetailController',
            'clients' => $clients,
        ]);
    }
}
