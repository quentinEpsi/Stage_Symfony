<?php

namespace App\Controller;

use App\Entity\Artisan;
use App\Repository\ArtisanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MoncompteController extends AbstractController
{
    /**
     * @Route("/moncompte/{id}", name="moncompte")
     * @param ArtisanRepository $repo
     * @param Artisan $idArtisan
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ArtisanRepository $repo, Artisan $idArtisan)
    {
        $artisans = $repo->find($idArtisan);
        return $this->render('moncompte/index.html.twig', [
            'controller_name' => 'MoncompteController',
            'artisan' => $artisans
        ]);
    }
}
