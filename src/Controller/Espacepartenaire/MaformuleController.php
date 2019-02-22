<?php

namespace App\Controller\Espacepartenaire;

use App\Repository\ArtisanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MaformuleController extends AbstractController
{
    /**
     * @Route("/artisan/maformule", name="maformule")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        return $this->render('maformule/index.html.twig', [
            'controller_name' => 'MaformuleController'
        ]);
    }

    /**
     * @Route("/artisan/maformule/", name="maformule")
     * @param ArtisanRepository $artisanRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(ArtisanRepository $artisanRepository)
    {
		$artisan= $this->get('security.token_storage')->getToken()->getUser();
        $formule = $artisan->getIdFormule();
        return $this->render('maformule/index.html.twig', [
            'controller_name' => 'MaformuleController',
            'maformule' => $formule,
            'artisan' => $artisan
        ]);
    }
}
