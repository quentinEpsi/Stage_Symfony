<?php

namespace App\Controller;

use App\Repository\ArtisanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminprestataireController extends AbstractController
{
    /**
     * @Route("/admin/adminprestataire", name="adminprestataire")
     */
    public function index(ArtisanRepository $repo)
    {
        $artisans = $repo->findAll();
        dump($artisans);
        return $this->render('admin/adminprestataire/index.html.twig', [
            'controller_name' => 'AdminprestataireController',
            'artisans' => $artisans
        ]);
    }
}
