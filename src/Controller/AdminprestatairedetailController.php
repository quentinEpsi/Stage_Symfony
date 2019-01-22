<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminprestatairedetailController extends AbstractController
{
    /**
     * @Route("/admin/adminprestatairedetail", name="adminprestatairedetail")
     */
    public function index()
    {
        return $this->render('admin/adminprestatairedetail/index.html.twig', [
            'controller_name' => 'AdminprestatairedetailController',
        ]);
    }
}
