<?php

namespace App\Controller;

use App\Entity\Artisan;
use App\Repository\ArtisanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminmodifprestataireController extends AbstractController
{
    /**
     * @Route("/admin/adminmodifprestataire/{id}", name="adminmodifprestataire")
     * @param ArtisanRepository $repo
     * @param Artisan $idArtisan
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ArtisanRepository $repo, Artisan $idArtisan)
    {
        $artisans = $repo->find($idArtisan);
        return $this->render('admin/adminmodifprestataire/index.html.twig', [
            'controller_name' => 'AdminmodifprestataireController',
            'artisans' => $artisans
        ]);
    }
}




