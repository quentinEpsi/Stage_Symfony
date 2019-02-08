<?php

namespace App\Controller;

use App\Entity\Artisan;
use App\Repository\ArtisanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EspacepartenaireController extends AbstractController
{
    /**
     * @Route("/espacepartenaire/{id}", name="espacepartenaire")
     * @param Artisan $idArtisan
     * @param ArtisanRepository $repo
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Artisan $idArtisan, ArtisanRepository $repo)
    {
        $artisan = $repo->find($idArtisan);
        return $this->render('espacepartenaire/index.html.twig', [
            'controller_name' => 'EspacepartenaireController',
            'artisan' => $artisan
        ]);
    }
}
