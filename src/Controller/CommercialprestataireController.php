<?php

namespace App\Controller;

use App\Repository\ArtisanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommercialprestataireController extends AbstractController
{
    /**
     * @Route("/commercial/commercialprestataire", name="commercialprestataire")
     */
    public function index(ArtisanRepository $repo)
    {
        $artisans = $repo->findAll();
        return $this->render('commercial/commercialprestataire/index.html.twig', [
            'controller_name' => 'CommercialprestataireController',
            'artisans' => $artisans,
        ]);
    }
}
