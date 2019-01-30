<?php

namespace App\Controller;

use App\Repository\ArtisanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminprestataireController extends AbstractController
{
    /**
     * @Route("/admin/adminprestataire", name="adminprestataire")
     * @param ArtisanRepository $repo
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ArtisanRepository $repo)
    {
        $artisans = $repo->findAll();
        return $this->render('admin/adminprestataire/index.html.twig', [
            'controller_name' => 'AdminprestataireController',
            'artisans' => $artisans
        ]);
    }
}
