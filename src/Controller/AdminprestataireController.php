<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminprestataireController extends AbstractController
{
    /**
     * @Route("/adminprestataire", name="adminprestataire")
     */
    public function index()
    {
        return $this->render('adminprestataire/index.html.twig', [
            'controller_name' => 'AdminprestataireController',
        ]);
    }
}
