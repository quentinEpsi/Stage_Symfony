<?php 
// src/Controller/IndexHtml.php 
// composer require opencage/geocode 
// composer require phpmailer/phpmailer 
 
///////////////////////////////////////////////////////////////////////// Dépendances ////////////////////////////////////// 
namespace App\Controller; 
use App\Entity\Client; 
use App\Entity\Artisan; 
use App\Entity\Service; 
use App\Entity\Parametre; 
use App\Entity\Jour; 
 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; 
 
use Symfony\Component\HttpFoundation\Response; 
use Symfony\Component\Routing\Annotation\Route; 
use Symfony\Component\HttpFoundation\Request; 
 
use Symfony\Component\Form\Extension\Core\Type\TextType; 
use Symfony\Component\Form\Extension\Core\Type\SubmitType; 
use Symfony\Component\Form\Extension\Core\Type\EmailType; 
use Symfony\Component\Form\Extension\Core\Type\TelType; 
use Symfony\Component\Form\Extension\Core\Type\TextareaType; 
use Symfony\Component\Form\Extension\Core\Type\DateTimeType; 
use Symfony\Component\Form\Extension\Core\Type\ChoiceType; 
 
use Symfony\Component\Validator\Constraints\DateTime; 
 
///////////////////////////////////////////////////////////////////////// Require ////////////////////////////////////////// 
//require "C:/Users/cleme/Desktop/Mes_documents/Etude/Stage/symfony/vendor/autoload.php"; 
 
 
///////////////////////////////////////////////////////////////////////// Class Artisan 
function calcul_distance($client_latitude,$client_longitude,$artisan_latitude,$artisan_longitude) 
{ 
	$client_latitude = deg2rad($client_latitude); 
	$client_longitude = deg2rad($client_longitude); 
	$artisan_latitude = deg2rad($artisan_latitude); 
	$artisan_longitude = deg2rad($artisan_longitude); 
	$resultat = 1852/1000.0*60*rad2deg(acos(sin($client_latitude)*sin($artisan_latitude)+cos($client_latitude)*cos($artisan_latitude)*cos($artisan_longitude-$client_longitude))); 
	return $resultat; 
} 
 
function disponibilite_date_to_decimal($date) 
{ 
	 
	$date_matin= new \DateTime(date_format($date,"Y-m-d h:i:sa")); 
	$date_aprem= new \DateTime(date_format($date,"Y-m-d h:i:sa")); 
	$date_soir= new \DateTime(date_format($date,"Y-m-d h:i:sa")); 
 
	$date_matin->setTime(12,00); 									// Détermination si la date donné est le matin ou est l'aprem ou est le soir  
	$date_aprem->setTime(16,00);									// !Statique! /// 
	$date_soir->setTime(20,00); 
 
	if($date<$date_matin) 
		$y=1; 
	else 
		$y=0; 
	dump($date); 
 
	if($date_matin<=$date && $date<$date_aprem) 
		$w=1; 
	else 
		$w=0; 
			 
	if($date_aprem<=$date && $date<=$date_soir) 
		$t=1; 
	else 
		$t=0; 
			 
	$day = date_format($date,'N'); 
	$day = intval($day); 
	$day = -($day-7); 
	 
	return 2**(3*$day+2)*$y + 2**(3*$day+1)*$w + 2**(3*$day)*$t; 
} 
 
/** 
 * @Route("/Suivi_de_ma_demande") 
 */	 
class InscriptionDemandePrestationController extends AbstractController 
{ 
	 /** 
     * @Route("/inscription",name="demande_prestation") 
     */ 
	 public function demande_prestation(Request $request) 
	 { 
		date_default_timezone_set ( "Europe/Paris" );    								// on set l'heure sur le bon UTC pour le datetime 
		 
		$service = $this->getDoctrine()->getRepository(Service::class)->findAll();  	// on prend tout les services éxistants 
		$nom_service = array();															// Récupération des noms des services 
		 
		foreach($service as $each_service)												// Parcours de tout les services existants 
			$nom_service[$each_service->getNomService()] = $each_service ;				// Association "Nom_service" => object_service 
 
		/////////// Création de l'objet de type formulaire et lien avec la base de donnée //////////// 
		$client = new Client(); 
 
		$form = $this->createFormBuilder($client)										// Création du formulaire 
			->add('nomClient',TextType::class) 
			->add('prenomClient',TextType::class) 
			->add('adresseInterventionNumero',TextType::class) 
			->add('adresseInterventionRue',TextType::class) 
			->add('adresseInterventionVille',TextType::class) 
			->add('adresseInterventionCp',TextType::class) 
			->add('adresse_complementaire_client',TextType::class) 
			->add('telClient',TelType::class) 
			->add('mailClient',EmailType::class) 
			->add('idService',ChoiceType::class,[ 'choices' => $nom_service ]) 
			->add('descriptionSup',TextareaType::class) 
			->add('dateRealisation',DateTimeType::class) 
			->add('Valider',SubmitType::class) 
			->getForm(); 
				 
		////////// Prise en charge de la validation du formulaire ////////// 
		$form->handleRequest($request);													// Traitement du formulaire 
		dump($client); 
		 
		if($form->isSubmitted() && $form->isValid())  									// si le formulaire est valide et que le formulaire a été soumis 
		{ 
			//// Initialisation //// 
			$entityManager = $this->getDoctrine()->getManager(); 
									// Création de l'avancement 
			$client->setDateProposition(new \DateTime('now')); 
			$adresse = $client->getAdresseInterventionNumero() . " " . $client->getAdresseInterventionRue() . "," .  $client->getAdresseInterventionCp() . " " . $client->getAdresseInterventionVille(); 
			dump($adresse); 
			 
			//// Détermination de la position GPS du client //// 
			$geocoder = new \OpenCage\Geocoder\Geocoder('b2df980a2f144759aa5c4f8d5fe448f8'); // utilisation de l'api Geocoder avec la clef API du compte 4rThem1s 
			$result = $geocoder->geocode('6 Impasse des Airaults, 49250 Beaufort-en-Vallée',['language' => 'fr', 'countrycode' => 'fr']); // requete a l'api 
			$choice = $result['results']; 												// je prends tous les résultats pour la requete 
			dump($choice); 
			 
			//// Réduction des possibilités par exclusion des country(régions), //// 
			$longueur = count($choice); 												// Calcul du nombre d'adresses potentielles trouvées 
			for($i =0;$i < $longueur;$i++) 												// Parcours de tous les résultats 
			{ 
				if($choice[$i]["components"]["_type"] == "county") 						// Si le résultat potentiel est égale a county (région) alors on l'enleve 
					unset($choice[$i]); 
				else if($choice[$i]["confidence"] <= 5) 
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
					 
					array_push($liste,$element); 										// Je mets l'element dans le nouveau tableau 
					$key = array_search($element, $choice); 							// Je cherche la position de cet element dans l'ancien tableau 
					unset($choice[$key]); 												// Je l'enleve de l'ancien tableau 
				} 
				$choice = $liste; 
				dump($liste); 
			} 
			 
			$first_address = array_shift($choice); 										// Je prend le premier element du tableau trié 
			$client_longitude = $first_address["geometry"]['lng']; 
			$client_latitude = $first_address["geometry"]['lat']; 
			$client->setCoordonneeLongitudeClient($client_longitude); 
			$client->setCoordonneeLatitudeClient($client_latitude); 
			 
			$parametre = $this->getDoctrine()->getRepository(Parametre::class)->findAll(); // liste des parametre 
			$max_distance = $parametre[0]->getDistanceMaxClientArtisan(); 				// distance maximum entre le client et l'artisan 
			$prix_reception_demande = $parametre[0]->getPrixReceptionDemande(); 		// Prix pour la reception de la demande 
			 
			$id_service_client = $client->getIdService()->getIdService(); 
			 
			/////////////////////////////////////////////////////////////////////////// DETERMINATION DES DEVIS DANS LE MEME SECTEUR QUE LE DEVIS ACTUEL //////////////////////////////////////////// 
			//$allClient = $this->getDoctrine()->getRepository(Client::class)->findAll(); // liste des parametre 
			 
			//// Détermination de la distance entre le client et les artisans //// 
			$jours = $this->getDoctrine()->getRepository(Jour::class)->findAll(); 
			$allArtisan = $this->getDoctrine()->getRepository(Artisan::class)->findAll(); // Je récupere tout les artisans de la base de donnée 
			 
			$list_distance =array(); 
			$AllRightArtisan = array(); 
			 
			//// Check de la date //// 
			$date_realisation= $client->getDateRealisation(); 
			$test = disponibilite_date_to_decimal($date_realisation); 
			dump($test); 
			$mask_client = decbin(disponibilite_date_to_decimal($date_realisation)); 
			dump($mask_client); 
			 
			 
			foreach($allArtisan as $one_artisan) 											// Parcours de tout les artisans 
			{ 
				dump($one_artisan); 
				//$persistentcollection = $one_artisan->getIdHoraire(); 
				//$disponibilite = $persistentcollection->getValues(); 
				//($disponibilite); 
				//$binary = decbin($disponibilite); 
				$test = $one_artisan->getIdHoraire()->getValues();
				dump($test);
				$collection_object = $one_artisan->getIdService(); 
				$services = $collection_object->getValues(); 
				$bool_service=false; 
				 
				foreach($services as $service) 
				{ 
					if($service->getIdService() == $id_service_client) 
						$bool_service=true; 
				} 
 
				if( $one_artisan->getCredit()>=$prix_reception_demande && $bool_service) 
				{ 
					$artisan_longitude =$one_artisan->getCoordonneeLongitude(); 
					$artisan_latitude = $one_artisan->getCoordonneeLatitude(); 
 
					$distance = calcul_distance($client_latitude,$client_longitude,$artisan_latitude,$artisan_longitude); 
					dump($distance); 
					if($distance <= $max_distance) 
					{ 
						$date_artisan = $one_artisan->getDateFinEngagement(); 
						$ajd = $client->getDateProposition(); 
						dump($date_artisan); 
						dump($ajd); 
						if($date_artisan > $ajd) 											// Prise en compte de l'abonnement de l'artisan 
							$distance = $distance * 0.8; 
						array_push($list_distance,$distance); 
						array_push($AllRightArtisan,$one_artisan); 
					} 
				} 
			} 
			dump($list_distance); 
			 
			 
			 
			//// Classement des artisans par la distance la moins élevée //// 
			$distance_classement =array(); 
			$artisan_classement =array(); 
			 
			$longueur = count($list_distance); 
			for($i=0;$i<$longueur;$i++) 												// Parcours du tableau contenant toutes les distances 
			{ 
				$min=1000; 
				foreach($list_distance as $distance_artisan) // Détermination du minimum 
				{ 
					if($distance_artisan < $min) 
						$min = $distance_artisan; 
				} 
				array_push($distance_classement,$min); 
				$key = array_search($min, $list_distance); 
				array_push($artisan_classement,$AllRightArtisan[$key]); 
 
				unset($list_distance[$key]); 
				unset($AllRightArtisan[$key]); 
			} 
			dump($artisan_classement); 
			dump($distance_classement); 
			 
			//// Stockage des artisans qui vont etre concerné par la demande //// 
			$longueur = count($artisan_classement); 
			$mod=0; 
			$chaine = ""; 
			if($longueur>5) // on veut 5 devis max 
			{ 
				$mod = $longueur%5; 
				$multiple = ($longueur-$mod)/5; 
				for($i=0;$i<$longueur - $mod;$i++) 
				{ 
					if($i<5) 
						$client->addIdArtisan($artisan_classement[$i]); 
					else 
					{ 
						$val = $artisan_classement[$i]->getIdArtisan(); 
						$chaine = $chaine . strval($val) . ':'; 
					} 
				} 
			} 
			else 
			{ 
				foreach($artisan_classement as $artisan_choice) 
				{ 
					$client->addIdArtisan($artisan_choice); 
				} 
			} 
			 
			 
			$entityManager->persist($client); 
			$entityManager->flush(); 
			 
			foreach($artisan_classement as $theartisan) 
			{ 
				 
			} 
			 
			 
			 
			 
			/* 
			//// Envoie du mail au client concernant sa demande de prestation 
			$mail = new PHPMailer(true);                              // Passing `true` enables exceptions 
			try { 
				//Server settings 
				//$mail->SMTPDebug = 2;                                 // Enable verbose debug output 
				$mail->isSMTP(true);                                      // Set mailer to use SMTP 
				$mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers 
				$mail->SMTPAuth = true;                               // Enable SMTP authentication 
				$mail->Username = 'petitlucas613@gmail.com';                 // SMTP username 
				$mail->Password = 'BH-e?%R?*TR2/n';                           // SMTP password 
				$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted 
				$mail->Port = 465;                                    // TCP port to connect to 
 
				//Recipients 
				$mail->setFrom('petitlucas613@gmail.com', 'Lucas Petit'); 
				$mail->addAddress('test.testtttdeboitemail@gmail.com', 'Martin');     // Add a recipient 
 
				//Content 
				$mail->isHTML(true);                                  // Set email format to HTML 
				$mail->Subject = 'Here is the subject'; 
				$mail->Body    = 'This is the HTML message body <b>in bold!</b>'; 
				$mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; 
 
				$mail->send(); 
				echo 'Message has been sent'; 
				} 
			catch (Exception $e) { 
				echo 'Message could not be sent. Mailer Error: ' . $e, $mail->ErrorInfo; 
			}*/			 
		} 
					 
		return $this->render('inscription_ma_demande/demande_prestation.html.twig',['form' =>$form->createView(),'services'=>$service]); 
	} 
}