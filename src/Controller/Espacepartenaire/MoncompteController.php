<?php

namespace App\Controller\Espacepartenaire;

use App\Repository\ArtisanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MoncompteController extends AbstractController
{
    /**
     * @Route("/moncompte/{id}", name="moncompte")
     * @param ArtisanRepository $artisanRepository
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ArtisanRepository $artisanRepository, $id)
    {
        $infoArtisans = $artisanRepository->find($id);
        $repository = $infoArtisans->getIdService();
        $infoService = $repository->getValues();
        return $this->render('moncompte/index.html.twig', [
            'controller_name' => 'MoncompteController',
            'infosArtisan' => $infoArtisans,
            'infoService' => $infoService
        ]);
    }
}
