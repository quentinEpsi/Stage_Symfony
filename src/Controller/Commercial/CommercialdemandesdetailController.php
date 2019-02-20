<?php

namespace App\Controller\Commercial;

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
     * @param Client $idClient
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index($id)
    {
        $clients = $this->getDoctrine()->getRepository(Client::class)->find($id);
        return $this->render('commercial/commercialdemandesdetail/index.html.twig', [
            'controller_name' => 'CommercialdemandesdetailController',
            'clients' => $clients
        ]);
    }

    /**
     * @Route("/commercial/commercialdemandesdetail/{id}", name="commercialdemandesdetail")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function show($id)
    {
        $infoClient = $this->getDoctrine()->getRepository(Client::class)->find($id);
        dump($infoClient);
        $repo = $infoClient->getIdArtisan();
        $infoArtisans = $repo->getValues();
        dump($infoArtisans);
        return $this->render('commercial/commercialdemandesdetail/index.html.twig', [
            'controller_name' => 'CommercialdemandesdetailController',
            'infoClient' => $infoClient,
            'infoArtisans' => $infoArtisans
        ]);
    }


}
