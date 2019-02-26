<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FinInscriptionDemandeController extends AbstractController
{
    /**
     * @Route("/fin/inscription/demande", name="fin_inscription_demande")
     */
    public function index()
    {
        return $this->render('fin_inscription_demande/index.html.twig', [
            'controller_name' => 'FinInscriptionDemandeController',
        ]);
    }
}
