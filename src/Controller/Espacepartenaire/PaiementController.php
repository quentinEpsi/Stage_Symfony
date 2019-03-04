<?php

namespace App\Controller\Espacepartenaire;

use App\Entity\Artisan;
use App\Entity\Parametre;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PaiementController extends AbstractController
{
    /**
     * @Route("/artisan/paiement", name="paiement")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $artisan= $this->get('security.token_storage')->getToken()->getUser();
        $param = $this->getDoctrine()->getRepository(Parametre::class)->findAll()[0];
        dump($param);
        $prixCredits = array();
        $prix = array();
        array_push($prix, $param->getPrixUnCredit() * 10, 10);
        array_push($prixCredits, $prix);
        $prix = array();
        array_push($prix, $param->getPrixUnCredit() * 25, 25);
        array_push($prixCredits, $prix);
        $prix = array();
        array_push($prix, $param->getPrixUnCredit() * 50, 50);
        array_push($prixCredits, $prix);
        $prix = array();
        array_push($prix, $param->getPrixUnCredit() * 100, 100);
        array_push($prixCredits, $prix);
        dump($prix);
        dump($prixCredits);
		
        return $this->render('paiement/index.html.twig', [
            'artisan' => $artisan,
            'param' => $param,
            'prixCredits' => $prixCredits
        ]);
    }
}