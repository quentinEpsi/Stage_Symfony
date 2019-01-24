<?php

namespace App\Controller;

use App\Entity\Artisan;
use App\Repository\ArtisanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminprestatairedetailController extends AbstractController
{
    /**
     * @Route("/admin/adminprestatairedetail", name="adminprestatairedetail")
     */
    public function index(ArtisanRepository $repository)
    {
        return $this->render('admin/adminprestatairedetail/index.html.twig', [
            'controller_name' => 'AdminprestatairedetailController',
        ]);
    }
}
