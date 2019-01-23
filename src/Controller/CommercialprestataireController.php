<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommercialprestataireController extends AbstractController
{
    /**
     * @Route("/commercial/commercialprestataire", name="commercialprestataire")
     */
    public function index()
    {
        return $this->render('commercial/commercialprestataire/index.html.twig', [
            'controller_name' => 'CommercialprestataireController',
        ]);
    }
}
