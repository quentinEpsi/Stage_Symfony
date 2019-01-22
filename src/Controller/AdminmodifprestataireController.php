<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminmodifprestataireController extends AbstractController
{
    /**
     * @Route("/adminmodifprestataire", name="adminmodifprestataire")
     */
    public function index()
    {
        return $this->render('adminmodifprestataire/index.html.twig', [
            'controller_name' => 'AdminmodifprestataireController',
        ]);
    }
}
