<?php

namespace App\Controller;

use App\Entity\Artisan;
use App\Repository\ArtisanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminprestatairedetailController extends AbstractController
{
    /**
     * @Route("/admin/adminprestatairedetail/{id}", name="adminprestatairedetail")
     * @param ArtisanRepository $repo
     * @param $idArtisan
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ArtisanRepository $repo, Artisan $idArtisan)
    {
        $artisans = $repo->find($idArtisan);
        dump($artisans);
        return $this->render('admin/adminprestatairedetail/index.html.twig', [
            'controller_name' => 'AdminprestatairedetailController',
            'artisans' => $artisans
        ]);
    }
}
