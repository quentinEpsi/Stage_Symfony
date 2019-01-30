<?php

namespace App\Controller;

use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommercialdemandesController extends AbstractController
{
    /**
     * @Route("/commercial/commercialdemandes", name="commercialdemandes")
     * @param ClientRepository $repo
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ClientRepository $repo)
    {
        $clients = $repo->findAll();
        return $this->render('commercial/commercialdemandes/index.html.twig', [
            'controller_name' => 'CommercialdemandesController',
            'clients' => $clients
        ]);
    }
}
