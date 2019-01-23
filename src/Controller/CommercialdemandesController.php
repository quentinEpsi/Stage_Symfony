<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommercialdemandesController extends AbstractController
{
    /**
     * @Route("/commercial/commercialdemandes", name="commercialdemandes")
     */
    public function index()
    {
        return $this->render('commercial/commercialdemandes/index.html.twig', [
            'controller_name' => 'CommercialdemandesController',
        ]);
    }
}
