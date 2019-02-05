<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MaformuleController extends AbstractController
{
    /**
     * @Route("/maformule", name="maformule")
     */
    public function index()
    {
        return $this->render('maformule/index.html.twig', [
            'controller_name' => 'MaformuleController',
        ]);
    }
}
