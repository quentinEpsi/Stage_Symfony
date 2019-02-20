<?php

namespace App\Controller;

use App\Entity\Artisan;
use App\Entity\Parametre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PaiementController extends AbstractController
{
    /**
     * @Route("/paiement/{id}", name="paiement")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index($id)
    {
        $artisan = $this->getDoctrine()->getRepository(Artisan::class)->find($id);
        $parametre = $this->getDoctrine()->getRepository(Parametre::class)->findAll();
        $prixReceptionDemande = $parametre[0]->getPrixReceptionDemande();
        return $this->render('paiement/index.html.twig', [
            'artisan' => $artisan,
            'prixReceptionDemande' => $prixReceptionDemande
        ]);
    }
}
