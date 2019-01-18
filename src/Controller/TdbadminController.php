<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TdbadminController extends AbstractController
{
    /**
     * @Route("/tdbadmin", name="tdbadmin")
     */
    public function index()
    {
        return $this->render('tdbadmin/index.html.twig', [
            'controller_name' => 'TdbadminController',
        ]);
    }
}
