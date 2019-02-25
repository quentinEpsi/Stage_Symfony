<?php

namespace App\Controller\Espacepartenaire;

use App\Entity\Devis;
use App\Entity\Client;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

function calcul_distance($client_latitude,$client_longitude,$artisan_latitude,$artisan_longitude) 
{ 
	$client_latitude = deg2rad($client_latitude); 
	$client_longitude = deg2rad($client_longitude); 
	$artisan_latitude = deg2rad($artisan_latitude); 
	$artisan_longitude = deg2rad($artisan_longitude); 
	$resultat = 1852/1000.0*60*rad2deg(acos(sin($client_latitude)*sin($artisan_latitude)+cos($client_latitude)*cos($artisan_latitude)*cos($artisan_longitude-$client_longitude))); 
	return $resultat; 
} 

class MesdemandesController extends AbstractController
{
    /**
     * @Route("/artisan/mesdemandes", name="mesdemandes")
     */
    public function mesdemandes()
    {
        date_default_timezone_set ( "Europe/Paris" );  

        $artisan= $this->get('security.token_storage')->getToken()->getUser();


        $mesDemandesAvantTri = $artisan->getIdClient()->getValues();

        $mesDemandes = array();
        $mesDemandesHisto = array();
        foreach($mesDemandesAvantTri as $demande)  
        {
            $tabDemandeEtMorif = array();
            $lesDevis = $this->getDoctrine()->getRepository(Devis::class)->findBy(array("idClient"=>$demande));

            $devisRefuserParLeClient = false;
            $auMoinsUnValidé = false;
            $refuse = false;
            $dejaValideParLartisan = false;
            $demandeDejaAccepterParQqunDautre = false;
            foreach($lesDevis as $leDevi) 
            {
                dump($demande);
                if($leDevi->getValidationDevis()) 
                {
                    $auMoinsUnValidé = true;
                    if($leDevi->getIdArtisan() != $artisan) $demandeDejaAccepterParQqunDautre = true;
                }
                if($leDevi->getIdArtisan() == $artisan)
                {
                    if($leDevi->getRefusDevis()) $refuse = true;

                    if($leDevi->getValidationDevis()) $dejaValideParLartisan = true;
                }

            }
            if(!$auMoinsUnValidé && !$refuse && !$dejaValideParLartisan)
            {
                array_push($tabDemandeEtMorif, $demande, "normal");
                array_push($mesDemandes, $tabDemandeEtMorif);
            }
            else if ($demandeDejaAccepterParQqunDautre) 
            {
                array_push($tabDemandeEtMorif, $demande, "AccepteParUnAutre");
                array_push($mesDemandesHisto, $tabDemandeEtMorif);
            }
            else if($refuse) 
            {
                array_push($tabDemandeEtMorif, $demande, "refus");
                array_push($mesDemandesHisto, $tabDemandeEtMorif);
            }
        }

        $tabDemandes = array();
        
        $historique = array();
        $chaineHistorique = array();

        foreach($mesDemandes as $demande)   
        {
            $idClient = $demande->getIdClient();
            $nomClient = $demande->getNomClient();
            $prenomClient = $demande->getPrenomClient();
            //$ServiceClient = $demande->
            //$adresseIntervention = $demande->getAdresseInterventionNumero()." ".$demande->getAdresseInterventionRue()." ".$demande->getAdresseInterventionVille()." ".$demande->getAdresseInterventionCp();
            $dateRealisationNonFormat = $demande->getDateRealisation()->format('d-m-Y');
            $dateProposition = $demande->getDateProposition()->format('d-m-Y H:i');
            $leNomService = $demande->getIdService()->getNomService();

            $LongCli = $demande->getCoordonneeLongitudeClient();
            $LatCli = $demande->getCoordonneeLatitudeClient();

            $LongArt = $artisan->getCoordonneeLongitude();
            $LatArt = $artisan->getCoordonneeLatitude();

            $distance = round((calcul_distance($LatCli, $LongCli, $LatArt, $LongArt)), 1);


            $datePropositionFormatOriginal = $demande->getDateProposition();

            if($datePropositionFormatOriginal < (new \DateTime('now'))){ //après les test inverser le signe pour afficher les proposition futur et non passé
            $uneDemande = array();
            array_push($uneDemande, $nomClient, $prenomClient, $dateProposition, $distance, $leNomService);
            array_push($tabDemandes,$uneDemande);
            } else {
                $idClient = $demande->getIdClient();
                $nomClient = $demande->getNomClient();
                $prenomClient = $demande->getPrenomClient();
                $chaineHistorique[0] = strval($idClient);
                $chaineHistorique[1] = $nomClient;
                $chaineHistorique[2] = $prenomClient;
                $chaineHistorique[3] = true;
                array_push($historique,$chaineHistorique);
            }
        }
        foreach($mesDemandesHisto as $demande)   
        {
            $idClient = $demande->getIdClient();
            $nomClient = $demande->getNomClient();
            $prenomClient = $demande->getPrenomClient();
            $chaineHistorique[0] = strval($idClient);
            $chaineHistorique[1] = $nomClient;
            $chaineHistorique[2] = $prenomClient;
            $chaineHistorique[3] = false;
            array_push($historique,$chaineHistorique);
        }
        
        dump($tabDemandes);
        
        dump($historique);

        return $this->render('mesdemandes/index.html.twig', [
            'controller_name' => 'MesdemandesController',
            'Historique' => $historique,
            'mesDemandes' => $tabDemandes,
        ]);
    }
}
