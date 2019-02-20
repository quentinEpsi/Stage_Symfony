<?php

namespace App\Controller\Espacepartenaire;

use App\Entity\Artisan;
use App\Repository\ArtisanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EspacePartenaireController extends AbstractController
{
    /**
     * @Route("/espacepartenaire/{id}", name="espacepartenaire")
     * @param Artisan $idArtisan
     * @param ArtisanRepository $repo
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index($id)
    {
        $artisan = $this->getDoctrine()->getRepository(Artisan::class)->find($id);
        return $this->render('espacepartenaire/index.html.twig', [
            'controller_name' => 'EspacepartenaireController',
            'artisan' => $artisan
        ]);
    }
}
