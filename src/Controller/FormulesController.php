<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FormulesController extends AbstractController
{
    /**
     * @Route("/formules", name="formules")
     */
    public function index()
    {
        return $this->render('formules/index.html.twig', [
            'controller_name' => 'FormulesController',
        ]);
    }
}
