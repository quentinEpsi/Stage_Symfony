<?php

namespace App\Controller\Espacepartenaire;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MesdemandesController extends AbstractController
{
    /**
     * @Route("/mesdemandes", name="mesdemandes")
     */
    public function index()
    {
        return $this->render('mesdemandes/index.html.twig', [
            'controller_name' => 'MesdemandesController',
        ]);
    }
}
