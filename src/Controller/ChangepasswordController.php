<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChangepasswordController extends AbstractController
{
    /**
     * @Route("/changepassword", name="changepassword")
     */
    public function index()
    {
        return $this->render('changepassword/index.html.twig', [
            'controller_name' => 'ChangepasswordController',
        ]);
    }
}
