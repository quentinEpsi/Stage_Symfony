<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdmindemandesdetailController extends AbstractController
{
    /**
     * @Route("/admindemandesdetail", name="admindemandesdetail")
     */
    public function index()
    {
        return $this->render('admindemandesdetail/index.html.twig', [
            'controller_name' => 'AdmindemandesdetailController',
        ]);
    }
}
