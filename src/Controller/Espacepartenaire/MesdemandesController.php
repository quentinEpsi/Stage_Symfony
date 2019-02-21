<?php

namespace App\Controller\Espacepartenaire;

use App\Entity\Client;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MesdemandesController extends AbstractController
{
    /**
     * @Route("/artisan/mesdemandes", name="mesdemandes")
     */
    public function mesdemandes()
    {
        date_default_timezone_set ( "Europe/Paris" );  

		$artisan= $this->get('security.token_storage')->getToken()->getUser();
        //$mesDemandes = $this->getDoctrine()->getRepository(Client::class)->findByIdArtisan($id);

        //dump($mesDemandes);

        return $this->render('mesdemandes/index.html.twig', [
            'controller_name' => 'MesdemandesController'
        ]);
    }
}
