<?php

namespace App\Controller;
//require_once(__DIR__.'/../../vendor/autoload.php');
//require "../vendor/autoload.php";

use App\Entity\Artisan;
use App\Entity\Service;
use App\Entity\Formules;
use App\Form\RegistrationFormType;

use function Sodium\add;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Form\FormError;


class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return Response
     * @throws \Exception
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
		date_default_timezone_set ( "Europe/Paris" );  
		$services = $this->getDoctrine()->getRepository(Service::class)->findAll(); //récupère les jours
		$nom_service = array();	
		
		foreach($services as $each_service)												// Parcours de tout les services existants 
			$nom_service[$each_service->getNomService()] = $each_service;	
		 
        $artisan = new Artisan();
        
        $form = $this->createFormBuilder($artisan)
			->add('nom',TextType::class)
			->add('prenom',TextType::class)
            ->add('mail', EmailType::class)
            ->add('motdepasse', PasswordType::class)
            ->add('verif_motdepasse', PasswordType::class)
            ->add('tel', TelType::class)
			->add('adresseInterventionNumeroArtisan',TextType::class)
			->add('adresseInterventionRueArtisan',TextType::class)
			->add('adresseInterventionVilleArtisan',TextType::class)
			->add('adresseInterventionCpArtisan',TextType::class)
			->add('adresseComplementaireArtisan',TextType::class, ['required' => false,'empty_data' => ''])
            ->add('siren',TextType::class)
            ->add('numassurance',TextType::class)
            ->add('description',TextareaType::class)
			->add('tableauService',ChoiceType::class,['choices' => $nom_service,'expanded'=>true,'multiple'=>true])
            ->add('Valider', SubmitType::class)
			->getForm(); // adresse + api siren
			
        $form->handleRequest($request);
		if($artisan->getMotdepasse() != $artisan->getVerifMotdepasse())
		{
			$error = new FormError("Le mot de passe est différent");
			$form->get('verif_motdepasse')->addError($error);
		}
		
        if ($form->isSubmitted() && $form->isValid()) {

			//verfier que l'Email et le SIREN n'existe pas
			$lesArtisans = $this->getDoctrine()->getRepository(Artisan::class)->findAll();
			$isExiste = false;
			foreach($lesArtisans as $leArtisan)
			{
				if($artisan->getMail() == $leArtisan->getMail())
				{
					$isExiste = true;
				}
				else if($artisan->getSiren() == $leArtisan->getSiren())
				{
					$isExiste = true;
				}

			}

			if(!$isExiste)
			{

            // encode the plain password
			$artisan->setDateInscription(new \DateTime('now'));
            $artisan->setMotdepasse($passwordEncoder->encodePassword($artisan, $artisan->getMotdepasse()));
			$artisan->setRoles(array("ROLE_ARTISAN"));
			
			foreach($artisan->getTableauService() as $service)
				$artisan->addIdService($service);
				
			$siren = $artisan->getSiren();
			dump($siren);
			$url = "https://data.opendatasoft.com/api/records/1.0/search/?dataset=sirene_v3%40public&sort=datederniertraitementetablissement&facet=etablissementsiege&facet=libellecommuneetablissement&facet=etatadministratifetablissement&facet=nomenclatureactiviteprincipaleetablissement&facet=caractereemployeuretablissement&facet=departementetablissement&facet=regionetablissement&facet=sectionetablissement&facet=classeetablissement&facet=statutdiffusionunitelegale&facet=unitepurgeeunitelegale&facet=sexeunitelegale&facet=categorieentreprise&facet=sectionunitelegale&facet=classeunitelegale&facet=naturejuridiqueunitelegale&refine.siren=".$siren;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); //A mettre si vous rencontrer des probleme de certificats SSL
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // cette ligne aussi lol
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json')); // Assuming you're requesting JSON
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			$response = curl_exec($ch);
			dump($response);
			
			
			// If using JSON...
			$data = json_decode($response);
			dump($data);
			$artisan->setRaisonSociale($data->records[0]->fields->denominationunitelegale);
			dump($data->records[0]->fields->denominationunitelegale);

			//// Détermination de la position GPS du client //// 
			//$geocoder = new \OpenCage\Geocoder\Geocoder('b2df980a2f144759aa5c4f8d5fe448f8'); // utilisation de l'api Geocoder avec la clef API du compte 4rThem1s 
			// If using JSON...
			//$data = json_decode($response);$result = $geocoder->geocode('6 Impasse des Airaults, 49250 Beaufort-en-Vallée',['language' => 'fr', 'countrycode' => 'fr']); // requete a l'api 
			//dump($result);
			
			$adressedeBase = $artisan->getAdresseInterventionNumeroArtisan()." ".$artisan->getAdresseInterventionRueArtisan().", ".$artisan->getAdresseInterventionCpArtisan()." ".$artisan->getAdresseInterventionVilleArtisan();
			$adresseEncode = urlencode($adressedeBase);
			dump($adresseEncode);
			$url = "https://api.opencagedata.com/geocode/v1/json?q=".$adresseEncode."&key=b2df980a2f144759aa5c4f8d5fe448f8&language=fr&pretty=1";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // ligne magique
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json')); // Assuming you're requesting JSON
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			$response = curl_exec($ch);
			dump($response);
			$data = json_decode($response);
			dump($data);
			$choice = $data->results; 

			
			
			
			dump($choice); 
			
			 
			//// Réduction des possibilités par exclusion des country(régions), //// 
			$longueur = count($choice); 												// Calcul du nombre d'adresses potentielles trouvées 
			for($i =0;$i < $longueur;$i++) 												// Parcours de tous les résultats 
			{ 
				if($choice[$i]->components->_type == "county") 						// Si le résultat potentiel est égale a county (région) alors on l'enleve 
					unset($choice[$i]); 
				else if($choice[$i]->confidence <= 5) 
					unset($choice[$i]); 
			} 
 
			//// Etablissement des coordonnes GPS correspondant a l'adresse donnée //// 
			$longueur = count($choice); 												// Calcul du nombre d'adresses potentielles restantes 
			if(count($choice) == 0) 
			{ 
				//probleme 
			} 
			else if($longueur>1) 														// On a encore trop de résultats probables 
			{ 
				//// Etablissement d'un classement basé sur la confiance du site envers les données qu'il nous a fournit 
				$liste = array(); 
				while(count($choice) != 0) 												// Je parcours les adresses restantes 
				{ 
					// Détermination du maximum 
					$max = 0; 
					$element = null; 
					foreach($choice as $location) 
					{ 
						$confidence = $location["confidence"]; 
						if($max < $location["confidence"]) 
						{ 
							$max = $confidence; 
							$element = $location; 
						} 
					} 
					// Maximum trouvées 
					 
					array_push($liste,$element); 										// Je mets le maximum dans le nouveau tableau 
					$key = array_search($element, $choice); 							// Je cherche la position de cet element dans l'ancien tableau 
					unset($choice[$key]); 												// Je l'enleve de l'ancien tableau 
				} 
				$choice = $liste; 
				dump($liste); 
			} 
			 
			$first_address = array_shift($choice); 										// Je prend le premier element du tableau trié (position la plus probable)
			$artisan_longitude = $first_address->geometry->lng; 
			$artisan_latitude = $first_address->geometry->lat; 
			$artisan->setCoordonneeLongitude($artisan_longitude); 
			$artisan->setCoordonneeLatitude($artisan_latitude); 
			
			
			
			dump($artisan);

			$formules = $this->getDoctrine()->getRepository(Formules::class)->findAll(); //récupère les jours
			$artisan->setIdFormule($formules[0]);
			$artisan->setCredit(0);
			$dateNowPlus2Semaine = date_add(new \DateTime('now'), date_interval_create_from_date_string('14 days'));
			$artisan->setDateFinGratuite($dateNowPlus2Semaine);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($artisan);
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $this->redirectToRoute('maformule');

							
		} else return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
			'current_page' => 'register',
			'erreur' => true
        ]);
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            'current_page' => 'register'
        ]);
    }
}
