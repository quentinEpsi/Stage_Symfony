<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Service;
use App\Entity\Devis;
use App\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home")
     * @return Response
     */

    public function index(): Response
    {
		$devis = $this->getDoctrine()->getRepository(Devis::class)->findAll();
		$test = $devis[0]->getIdClient();
		$nom = $test->getNomClient();

		
		$clients = $this->getDoctrine()->getRepository(Client::class)->findAll();

		$test2 = $this->getDoctrine()->getRepository(Client::class)->find($devis[0]);

		$articles = $this->getDoctrine()->getRepository(Article::class)->findAll(); 
		$services = $this->getDoctrine()->getRepository(Service::class)->findAll(); 

		$longueur = count($services)-1;
		$mod = $longueur%4;
		$boucle = ($longueur - $mod)/4-1;
		if($mod>0)
			$boucle++;

        return $this->render('pages/home.html.twig', [
            'current_page' => 'accueil',
			'article1' => $articles[0],
			'article2' => $articles[1],
			'article3' => $articles[2],
			'services' => $services,
			'longueur' => $longueur
        ]);

    }


}


