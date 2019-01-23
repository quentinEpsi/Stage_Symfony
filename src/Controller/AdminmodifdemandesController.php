<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminmodifdemandesController extends AbstractController
{
    /**
     * @Route("/admin/adminmodifdemandes", name="adminmodifdemandes")
     */
    public function index()
    {
        return $this->render('admin/adminmodifdemandes/index.html.twig', [
            'controller_name' => 'AdminmodifdemandesController',
        ]);
    }
}
