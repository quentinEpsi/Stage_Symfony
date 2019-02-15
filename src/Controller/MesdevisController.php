<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Devis;
use App\Entity\Artisan;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class MesdevisController extends AbstractController
{
    /**
     * @Route("/mesdevis/{id}", name="mesdevis")
     */
    public function index($id)
    {
        date_default_timezone_set ( "Europe/Paris" );  

        $devis = $this->getDoctrine()->getRepository(Devis::class)->findDevisByIdArtisan($id);
        dump($devis);
        
        $infoDevisTab = array();

        foreach($devis as $each_devis1)
        {
            $clients = $each_devis1->getIdClient();
            $nomClient = $clients->getNomClient();
            $prenomClient = $clients->getPrenomClient();
            $adresseIntervention = $clients->getAdresseInterventionNumero()." ".$clients->getAdresseInterventionRue()." ".$clients->getAdresseInterventionVille()." ".$clients->getAdresseInterventionCp();
            $dateDevis = $each_devis1->getDateEnvoie()->format('Y-m-d H:i:s');
            $fichierJoint = $each_devis1->getFichierJoint();
            $dateRealisation = $clients->getDateRealisation();
            $statusDevis = "";
            if ($each_devis1->getValidationDevis() == 1 && $each_devis1->getRefusDevis() == 0)
                $statusDevis = "Devis Validé";
            else if ($each_devis1->getValidationDevis() == 0 && $each_devis1->getRefusDevis() == 1)
                $statusDevis = "Devis Refusé ";
            else if ($each_devis1->getValidationDevis() == 0 && $each_devis1->getRefusDevis() == 0)
                $statusDevis = "Devis en attente";
            $unDevi = array();
            if($dateRealisation > (new \DateTime('now'))){
            array_push($unDevi, $nomClient, $prenomClient, $adresseIntervention,$dateDevis,$fichierJoint, $statusDevis);
            array_push($infoDevisTab,$unDevi);
            }
        }
        											
        $historique = array();
        
        foreach($devis as $each_devis2)
        {
            $clients = $each_devis2->getIdClient();
            $nomClient = $clients->getNomClient();
            $dateRealisation = $clients->getDateRealisation();
            //dump($each_devis);
            //$client = $this->getDoctrine()->getRepository(Client::class)->find($clients->getIdClient());			
            //dump($client);									
            $caractereHistorique = "Devis ".$each_devis2->getIdDevis()." - ".$nomClient;
            if($dateRealisation <= (new \DateTime('now')))
            array_push($historique,$caractereHistorique);
        }
    
        /*$persistantcollection = $artisan->getIdService();
        $services = $persistantcollection->getValues();
        dump($services);*/

        
        return $this->render('mesdevis/index.html.twig', [
            'controller_name' => 'MesdevisController',
            'nombreDevisNonVisualise' => 0,
            'chaineHistorique' => $historique,
            'chaineDevis' => $infoDevisTab
       ]);
    }
}
