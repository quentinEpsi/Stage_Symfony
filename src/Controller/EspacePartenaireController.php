<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EspacePartenaireController extends AbstractController
{
    /**
     * @Route("/espace/partenaire", name="espace_partenaire")
     */
    public function index()
    {
        return $this->render('espace_partenaire/index.html.twig', [
            'controller_name' => 'EspacePartenaireController',
        ]);
    }
}
