<?php

namespace App\Controller;

use App\Entity\Artisan;
use App\Repository\ArtisanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommercialdemandesdetailController extends AbstractController
{
    /**
     * @Route("/commercial/commercialdemandesdetail", name="commercialdemandesdetail")
     * @param ArtisanRepository $repo
     * @param Artisan $idArtisan
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ArtisanRepository $repo, Artisan $idArtisan)
    {
        $clients = $repo->find($idArtisan);
        return $this->render('commercial/commercialdemandesdetail/index.html.twig', [
            'controller_name' => 'CommercialdemandesdetailController',
            'clients' => $clients
        ]);
    }
}
