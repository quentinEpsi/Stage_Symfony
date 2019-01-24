<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdmindemandesdetailController extends AbstractController
{
    /**
     * @Route("admin/admindemandesdetail", name="admindemandesdetail")
     */
    public function index()
    {
        return $this->render('admin/admindemandesdetail/index.html.twig', [
            'controller_name' => 'AdmindemandesdetailController',
        ]);
    }

}
