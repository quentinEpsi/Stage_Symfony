<?php

namespace App\Controller\Espacepartenaire;

use App\Entity\Devis;
use App\Entity\Client;
use App\Entity\Choisir;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class refuserPrestationController extends AbstractController
{
    /**
     * @Route("/artisan/mesdemandes/refuser/{id}", name="refuserPrestation")
     */
    public function mesdemandes($id)
    {
        date_default_timezone_set ( "Europe/Paris" );  

        $artisan= $this->get('security.token_storage')->getToken()->getUser();

        $leChoisir = $this->getDoctrine()->getRepository(Choisir::class)->findleChoix($id,$artisan->getIdArtisan())[0];
        $entityManager = $this->getDoctrine()->getManager();
        $leChoisir->setRefuser(1);
        $entityManager->persist($leChoisir);
        $entityManager->flush();

        return $this->redirectToRoute('mesdemandes');
    }
}
