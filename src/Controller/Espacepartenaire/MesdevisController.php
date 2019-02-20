<?php

namespace App\Controller\Espacepartenaire;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MesdevisController extends AbstractController
{
    /**
     * @Route("/mesdevis", name="mesdevis")
     */
    public function index()
    {
        return $this->render('mesdevis/index.html.twig', [
            'controller_name' => 'MesdevisController',
        ]);
    }
}
