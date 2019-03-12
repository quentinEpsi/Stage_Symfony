<?php

namespace App\Controller\Espacepartenaire;

use App\Entity\Parametre;
use App\Entity\Formule;

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
     * @Route("/artisan/maformule", name="maformule")
     * @param ArtisanRepository $artisanRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(ArtisanRepository $artisanRepository)
    {
		$artisan= $this->get('security.token_storage')->getToken()->getUser();
        $formule = $artisan->getIdFormule();
        $formuleDescri = "";
        $nomFormule = $formule->getNomFormule();
        $param = $this->getDoctrine()->getRepository(Parametre::class)->findAll()[0];
        if ($nomFormule == "Gratuit")
            $formuleDescri = $formule -> getDescriptionFormule()."( Durée: ".$param->getPeriodeGratuite()." mois )";
        else 
        $formuleDescri = $formule -> getDescriptionFormule();
        return $this->render('maformule/index.html.twig', [
            'controller_name' => 'MaformuleController',
            'maformule' => $formule,
            'artisan' => $artisan,
            'param' => $param,
            'formuleDescri' => $formuleDescri
        ]);
    }
}
