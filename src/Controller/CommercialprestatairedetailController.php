<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommercialprestatairedetailController extends AbstractController
{
    /**
     * @Route("/commercial/commercialprestatairedetail", name="commercialprestatairedetail")
     */
    public function index()
    {
        return $this->render('commercial/commercialprestatairedetail/index.html.twig', [
            'controller_name' => 'CommercialprestatairedetailController',
        ]);
    }
}
