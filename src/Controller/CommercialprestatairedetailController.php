<?php

namespace App\Controller;

use App\Entity\Artisan;
use App\Repository\ArtisanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommercialprestatairedetailController extends AbstractController
{
    /**
     * @Route("/commercial/commercialprestatairedetail/{id}", name="commercialprestatairedetail")
     * @param Artisan $idArtisan
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index($id)
    {
        $artisans = $this->getDoctrine()->getRepository(Artisan::class)->find($id);
        return $this->render('commercial/commercialprestatairedetail/index.html.twig', [
            'controller_name' => 'CommercialprestatairedetailController',
            'artisans' => $artisans
        ]);
    }


}
