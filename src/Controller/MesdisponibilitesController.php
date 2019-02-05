<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MesdisponibilitesController extends AbstractController
{
    /**
     * @Route("/mesdisponibilites", name="mesdisponibilites")
     */
    public function index()
    {
        return $this->render('mesdisponibilites/index.html.twig', [
            'controller_name' => 'MesdisponibilitesController',
        ]);
    }
}
