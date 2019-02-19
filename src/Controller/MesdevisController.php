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
                
        $infoDevisTab = array();

        foreach($devis as $each_devis1)
        {
            $clients = $each_devis1->getIdClient();
            $nomClient = $clients->getNomClient();
            $prenomClient = $clients->getPrenomClient();
            $adresseIntervention = $clients->getAdresseInterventionNumero()." ".$clients->getAdresseInterventionRue()." ".$clients->getAdresseInterventionVille()." ".$clients->getAdresseInterventionCp();
            $dateDevis = $each_devis1->getDateEnvoie()->format('d-m-Y');
            $fichierJoint = $each_devis1->getFichierJoint();
            $dateRealisation = $clients->getDateRealisation();
            $datePrevuRealisation = $dateRealisation->format('d-m-Y H:i');
            $devisVisualise ="";
            $statusDevis = "";
            if ($each_devis1->getValidationDevis() == 1 && $each_devis1->getRefusDevis() == 0)
                $statusDevis = "Devis Validé";
            else if ($each_devis1->getValidationDevis() == 0 && $each_devis1->getRefusDevis() == 1)
                $statusDevis = "Devis Refusé ";
            else if ($each_devis1->getValidationDevis() == 0 && $each_devis1->getRefusDevis() == 0)
                $statusDevis = "Devis en attente";
            if($each_devis1->getVisualiseDevis() == 1)
                $devisVisualise = "Le devis a été visualisé";
              else if($each_devis1->getVisualiseDevis() == 0)
                $devisVisualise = "Le devis n'a pas été visualisé";
            dump($datePrevuRealisation);
            $unDevi = array();
            if($dateRealisation > (new \DateTime('now'))){
            array_push($unDevi, $nomClient, $prenomClient, $adresseIntervention,$dateDevis,$datePrevuRealisation, $fichierJoint, $statusDevis, $devisVisualise);
            array_push($infoDevisTab,$unDevi);
            }
        }
        											
        $historique = array();
        $chaineHistorique = array();
        
        foreach($devis as $each_devis2)
        {
            $clients = $each_devis2->getIdClient();
            $nomClient = $clients->getNomClient();
            $dateRealisation = $clients->getDateRealisation();
            $idDevis = 	$each_devis2->getIdDevis();								
            if($dateRealisation <= (new \DateTime('now')))
                {
                $chaineHistorique[0] = strval($idDevis);
                $chaineHistorique[1] = $nomClient;
                array_push($historique,$chaineHistorique);
                }
        }
         
        return $this->render('mesdevis/index.html.twig', [
            'controller_name' => 'MesdevisController',
            'nombreDevisNonVisualise' => 0,
            'Historique' => $historique,
            'chaineDevis' => $infoDevisTab
       ]);
    }
}
