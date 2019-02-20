<?php

namespace App\Controller\Espacepartenaire;

use App\Repository\ArtisanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MoncompteController extends AbstractController
{
    /**
     * @Route("/artisan/moncompte", name="moncompte")
     * @param ArtisanRepository $artisanRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ArtisanRepository $artisanRepository)
    {
        $infoArtisan= $this->get('security.token_storage')->getToken()->getUser();
		dump($infoArtisan);
        $infoService = $infoArtisan->getIdService()->getValues();

        return $this->render('moncompte/index.html.twig', [
            'controller_name' => 'MoncompteController',
            'infosArtisan' => $infoArtisan,
            'infoService' => $infoService
        ]);
    }
}
