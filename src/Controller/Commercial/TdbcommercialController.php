<?php

namespace App\Controller\Commercial;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TdbcommercialController extends AbstractController
{
    /**
     * @Route("/commercial/tdbcommercial", name="tdbcommercial")
     */
    public function index()
    {
        return $this->render('tdbcommercial/index.html.twig', [
            'controller_name' => 'TdbcommercialController',
        ]);
    }
}
