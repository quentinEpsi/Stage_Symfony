<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FormulemodifController extends AbstractController
{
    /**
     * @Route("/formulemodif", name="formulemodif")
     */
    public function index()
    {
        return $this->render('formulemodif/index.html.twig', [
            'controller_name' => 'FormulemodifController',
        ]);
    }
}
