<?php

namespace App\Controller;

use App\Entity\Artisan;
use App\Repository\ArtisanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MoncomptemodifController extends AbstractController
{
    /**
     * @Route("/moncomptemodif/{id}", name="moncomptemodif")
     * @param ArtisanRepository $repo
     * @param Artisan $idArtisan
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ArtisanRepository $repo, Artisan $idArtisan)
    {
        $artisans = $repo->find($idArtisan);
        return $this->render('moncomptemodif/index.html.twig', [
            'controller_name' => 'MoncomptemodifController',
            'artisan' => $artisans
        ]);
    }
}
