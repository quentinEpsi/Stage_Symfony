<?php

namespace App\Controller\Espacepartenaire;

use App\Repository\ArtisanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MaformuleController extends AbstractController
{
    /**
     * @Route("/maformule", name="maformule")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        return $this->render('maformule/index.html.twig', [
            'controller_name' => 'MaformuleController'
        ]);
    }

    /**
     * @Route("/maformule/{id}", name="maformule")
     * @param ArtisanRepository $artisanRepository
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(ArtisanRepository $artisanRepository, $id)
    {
        $infoArtisan = $artisanRepository->find($id);
        $repo = $infoArtisan->getIdFormule();
        return $this->render('maformule/index.html.twig', [
            'controller_name' => 'MaformuleController',
            'maformule' => $repo,
            'artisan' => $infoArtisan
        ]);
    }
}
