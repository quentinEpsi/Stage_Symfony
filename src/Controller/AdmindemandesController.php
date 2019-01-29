<?php

namespace App\Controller;

use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdmindemandesController extends AbstractController
{
    /**
     * @Route("/admin/admindemandes", name="admindemandes")
     */
    public function index(ClientRepository $repo)
    {
        $clients = $repo->findAll();
        return $this->render('admin/admindemandes/index.html.twig', [
            'controller_name' => 'AdmindemandesController',
            'clients' => $clients
        ]);
    }

}
