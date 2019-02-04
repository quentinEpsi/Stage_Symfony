<?php

namespace App\Controller;

use App\Repository\ClientRepository;
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

    /**
     * @Route("/admin/adminmodifdemandes/{id}", name="adminmodifdemandes")
     * @param ClientRepository $clientRepository
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function show(ClientRepository $clientRepository, $id)
    {
        $infoClient = $clientRepository->find($id);
        dump($infoClient);
        $repo = $infoClient->getIdArtisan();
        $infoArtisans = $repo->getValues();
        dump($infoArtisans);
        return $this->render('admin/adminmodifdemandes/index.html.twig', [
            'controller_name' => 'AdminmodifdemandesController',
            'infoClient' => $infoClient,
            'infoArtisans' => $infoArtisans
        ]);
    }
}
