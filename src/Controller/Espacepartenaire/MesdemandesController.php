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
            $tabDemandeEtMotifHisto = array();
            $tabDemandeEtMotifPrincipal = array();
            $lesDevis = $this->getDoctrine()->getRepository(Devis::class)->findBy(array("idClient"=>$demande));

            $devisRefuserParLeClient = false;
            $auMoinsUnValidé = false;
            $refuse = false;
            $dejaValideParLartisan = false;
            $demandeDejaAccepterParQqunDautre = false;
            $avecDevis = false;

            $idClient = $demande->getIdClient();
            $nomClient = $demande->getNomClient();
            $prenomClient = $demande->getPrenomClient();
            $dateRealisationNonFormat = $demande->getDateRealisation()->format('d-m-Y');
            $dateProposition = $demande->getDateProposition()->format('d-m-Y H:i');
            $leNomService = $demande->getIdService()->getNomService();

            $LongCli = $demande->getCoordonneeLongitudeClient();
            $LatCli = $demande->getCoordonneeLatitudeClient();

            $LongArt = $artisan->getCoordonneeLongitude();
            $LatArt = $artisan->getCoordonneeLatitude();

            $distance = round((calcul_distance($LatCli, $LongCli, $LatArt, $LongArt)), 1);

            //$dejaVu = $demande->get

            $datePropositionFormatOriginal = $demande->getDateProposition();
            //Si c'est un histo
            $chaineHistorique = array();

            $chaineHistorique[0] = strval($idClient);
            $chaineHistorique[1] = $nomClient;
            $chaineHistorique[2] = $prenomClient;

            //Si c'est un affichage
            $chaineDemande = array();
            array_push($chaineDemande, $nomClient, $prenomClient, $dateProposition, $distance, $leNomService);


            foreach($lesDevis as $leDevi) 
            {

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
                if($leDevi->getIdArtisan() == $artisan) $avecDevis = true;


            }
            if(!$auMoinsUnValidé && !$refuse && $dejaValideParLartisan)
            {
                $stringNormal = "valide";
                array_push($tabDemandeEtMotifHisto, $chaineHistorique, $stringNormal);
                array_push($mesDemandes, $tabDemandeEtMotifHisto);
            }
            else if ($refuse) 
            {
                $stringAccepte = "refus";
                array_push($tabDemandeEtMotifHisto, $chaineHistorique, $stringAccepte);
                array_push($mesDemandesHisto, $tabDemandeEtMotifHisto);
            }
            else if($demandeDejaAccepterParQqunDautre) 
            {
                $stringRefus = "AccepteParUnAutre";
                array_push($tabDemandeEtMotifHisto, $chaineHistorique, $stringRefus);
                array_push($mesDemandesHisto, $tabDemandeEtMotifHisto);
            } else if ($datePropositionFormatOriginal < (new \DateTime('now')))
            {
                $stringDelai = "DelaiDepasse";
                array_push($tabDemandeEtMotifHisto, $chaineHistorique, $stringDelai);
                array_push($mesDemandesHisto, $tabDemandeEtMotifHisto);
            } else if (!$avecDevis)
            {
                $stringDelai = "attenteDevi";
                array_push($tabDemandeEtMotifPrincipal, $chaineDemande, $stringDelai);
                array_push($mesDemandes, $tabDemandeEtMotifPrincipal);
            } else
            {
                $stringDelai = "AttenteValidation";
                array_push($tabDemandeEtMotifPrincipal, $chaineDemande, $stringDelai);
                array_push($mesDemandes, $tabDemandeEtMotifPrincipal);
            }
        }

        dump($mesDemandesHisto);
        dump($mesDemandes);

        return $this->render('mesdemandes/index.html.twig', [
            'controller_name' => 'MesdemandesController',
            'Historique' => $mesDemandesHisto,
            'mesDemandes' => $mesDemandes,
        ]);
    }
}
