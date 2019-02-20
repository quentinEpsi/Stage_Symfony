<?php

namespace App\Controller\Espacepartenaire;

use App\Entity\Artisan;
use App\Repository\ArtisanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EspacePartenaireController extends AbstractController
{
    /**
     * @Route("/artisan/espacepartenaire/", name="espacepartenaire")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        return $this->render('espacepartenaire/index.html.twig', [
            'controller_name' => 'EspacepartenaireController',
        ]);
    }
}
