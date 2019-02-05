<?php

namespace App\Controller;

use App\Repository\ClientRepository;
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

    /**
     * @Route("/admin/admindemandesdetail/{id}", name="admindemandesdetail")
     * @param ClientRepository $clientRepository
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function show(ClientRepository $clientRepository, $id)
    {
        $infoClient = $clientRepository->find($id);
        $repo = $infoClient->getIdArtisan();
        $infoArtisans = $repo->getValues();
        return $this->render('admin/admindemandesdetail/index.html.twig', [
            'controller_name' => 'AdmindemandesdetailController',
            'infoClient' => $infoClient,
            'infoArtisans' => $infoArtisans
        ]);
    }
}
