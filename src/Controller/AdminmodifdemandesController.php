<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminmodifdemandesController extends AbstractController
{
    /**
     * @Route("/adminmodifdemandes", name="adminmodifdemandes")
     */
    public function index()
    {
        return $this->render('adminmodifdemandes/index.html.twig', [
            'controller_name' => 'AdminmodifdemandesController',
        ]);
    }
}
