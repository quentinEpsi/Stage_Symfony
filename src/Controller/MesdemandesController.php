<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Artisan;

use App\Controller\InscriptionDemandePrestationController;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MesdemandesController extends AbstractController
{
    /**
     * @Route("/mesdemandes/{id}", name="mesdemandes")
     */
    public function mesdemandes($id)
    {
        date_default_timezone_set ( "Europe/Paris" );  

        $artisan = $this->getDoctrine()->getRepository(Artisan::class)->find($id); //récupère l'artisan
 
        $mesDemandes = $this->getDoctrine()->getRepository(Client::class)->findAll();

        dump($mesDemandes);

        $tabDemandes = array();

        $historique = array();
        $chaineHistorique = array();

        foreach($mesDemandes as $demande)
        {
            $idClient = $demande->getIdClient();
            $nomClient = $demande->getNomClient();
            $prenomClient = $demande->getPrenomClient();
            $ServiceClient = $demande->
            //$adresseIntervention = $demande->getAdresseInterventionNumero()." ".$demande->getAdresseInterventionRue()." ".$demande->getAdresseInterventionVille()." ".$demande->getAdresseInterventionCp();
            $dateRealisation = $demande->getDateRealisation()->format('d-m-Y');
            $dateProposition = $demande->getDateProposition()->format('d-m-Y H:i');

            $LongCli = $demande->getCoordonneeLongitudeClient();
            $LatCli = $demande->getCoordonneeLatitudeClient();

            $LongArt = $artisan->getCoordonneeLongitude();
            $LatArt = $artisan->getCoordonneeLatitude();

            $distance = round((calcul_distance($LatCli, $LongCli, $LatArt, $LongArt)), 1);


            $dateRealisationFormatOriginal = $demande->getDateRealisation();

            if($dateRealisation < (new \DateTime('now'))){ //après les test inverser le signe pour afficher les proposition futur et non passé
            $uneDemande = array();
            array_push($uneDemande, $nomClient, $prenomClient, $dateProposition, $distance);
            array_push($tabDemandes,$uneDemande);
            } else {
                $chaineHistorique[0] = strval($idClient);
                $chaineHistorique[1] = $nomClient;
                $chaineHistorique[2] = $nomClient;
                array_push($historique,$chaineHistorique);
            }
        }


        return $this->render('mesdemandes/index.html.twig', [
            'controller_name' => 'MesdemandesController',
            'Historique' => $historique,
            'mesDemandes' => $tabDemandes,
        ]);
    }
}
