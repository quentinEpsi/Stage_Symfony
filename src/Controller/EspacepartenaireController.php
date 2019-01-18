<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EspacePartenaireController extends AbstractController
{
    /**
     * @Route("/espacepartenaire", name="espacepartenaire")
     */
    public function index()
    {
        return $this->render('espacepartenaire/index.html.twig', [
            'controller_name' => 'EspacepartenaireController',
        ]);
    }
}
