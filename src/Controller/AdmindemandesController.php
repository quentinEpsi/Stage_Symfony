<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdmindemandesController extends AbstractController
{
    /**
     * @Route("/admindemandes", name="admindemandes")
     */
    public function index()
    {
        return $this->render('admindemandes/index.html.twig', [
            'controller_name' => 'AdmindemandesController',
        ]);
    }
}