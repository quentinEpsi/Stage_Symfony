<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Devis;
use App\Entity\Artisan;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class MesDevisDetailController extends AbstractController
{
    /**
     * @Route("/mondevisdetail/{id}", name="mondevisdetail")
     */
    public function index($id)
    {
        date_default_timezone_set ( "Europe/Paris" );  
        
        $devis = $this->getDoctrine()->getRepository(Devis::class)->find($id);
        $client = $devis->getIdCLient();
        $dateDevis = $devis->getDateEnvoie()->format('d-m-Y');
        $dateRealisation = $client->getDateRealisation()->format('d-m-Y H:i');   
         
        return $this->render('mondevisdetail/index.html.twig', [
            'controller_name' => 'MesDevisDetailController',
            'Devis' => $devis,
            'Client'=> $client,
            'dateDevis'=>$dateDevis,
            'dateRealisation'=>$dateRealisation
       ]);
    }
}