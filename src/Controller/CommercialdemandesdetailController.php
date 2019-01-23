<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommercialdemandesdetailController extends AbstractController
{
    /**
     * @Route("/commercial/commercialdemandesdetail", name="commercialdemandesdetail")
     */
    public function index()
    {
        return $this->render('commercial/commercialdemandesdetail/index.html.twig', [
            'controller_name' => 'CommercialdemandesdetailController',
        ]);
    }
}
