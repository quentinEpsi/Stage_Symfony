<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Artisan;
use App\Entity\Client;
use App\Entity\ServiceCommercial;
use App\Entity\Devis;
use App\Entity\Formules;
use App\Entity\Service;
use App\Entity\Parametre;
use App\Entity\Article;
use App\Entity\Jour;
use App\Entity\EtatAvancement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
	private $passwordEncoder;

     public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
         $this->passwordEncoder = $passwordEncoder;
     }

    public function load(ObjectManager $manager)
    {
        //// DEFINITION DES SERVICES ///////////////////////////////////////////
        $liste_service = array('Ouverture de porte bloquée, claquée ou sans clé','
Ouverture de coffre-fort bloqué','
Réparation de tous types d’ouvrage de serrurerie','
Changement de serrure','
Installation de tout type de portes, de portails, de rideaux métalliques','
Blindage de porte et/ou de fenêtre','
Réalisation de double de clé','
Autres');

        foreach($liste_service as $oneservice)
        {
            $service = new Service();
            $service->setNomService($oneservice);
            $manager->persist($service);
        }
        $manager->flush();

        //// DEFINITION DES ARTICLES /////////////////////////////////////////
        $article1 = new Article();
        $article1->setPhotoArticle("Lien 1 sympa vers la photo");
        $article1->setDescriptionFormule("Cet article est utile");
        $manager->persist($article1);

        $article2 = new Article();
        $article2->setPhotoArticle("Lien 2 sympa vers la photo");
        $article2->setDescriptionFormule("Cet article est toujours plus utile");
        $manager->persist($article2);

        $article3 = new Article();
        $article3->setPhotoArticle("Lien 3 sympa vers la photo");
        $article3->setDescriptionFormule("Cet article est vraiment utile");
        $manager->persist($article3);

        //// DEFINITION DES FORMULES ///////////////////////////////////////////
        $formule1 = new Formules();
        $formule1->setNomFormule('FORMULE GRATUITE');
        $formule1->setDescriptionFormule("Formule entièrement gratuite avec un nombre de devis limités par mois");
        $manager->persist($formule1);

        $formule2 = new Formules();
        $formule2->setNomFormule('FORMULE ESPRIT LIBRE');
        $formule2->setDescriptionFormule("Formule permettant d'approvisionner son compte à son aise avec des crédits");
        $manager->persist($formule2);

        $formule3 = new Formules();
        $formule3->setNomFormule('FORMULE ABONNEMENT');
        $formule3->setDescriptionFormule("Formule permettant de bénéficier de nos services à tarif réduit");
        $manager->persist($formule3);
        $manager->flush();

		//// ETAT AVANCEMENT //////////////////////////////////////
		$etat = new EtatAvancement();
		$etat->setNomEtatAvancement('en attende de validation');
		$manager->persist($etat);
		
		$etat1 = new EtatAvancement();
		$etat1->setNomEtatAvancement('validé, en attente de prestation');
		$manager->persist($etat1);
		
		$etat2 = new EtatAvancement();
		$etat2->setNomEtatAvancement('expiré');
		$manager->persist($etat2);
		$manager->flush();
		
        //// DEFINITION DES PARAMETRES ////////////////////////////////////////////
        $parametre = new Parametre();
        $parametre->setPeriodeGratuite('2');
        $parametre->setPrixReceptionDemande(2);
        $parametre->setPrixValidationDemande(3);
        $parametre->setDistanceMaxClientArtisan(100);
		$parametre->setPrixUnCredit(2.0);
		$parametre->setPrixAbonnement(5);
		$parametre->setPrixReceptionDemandeAbonnement(1);
		$parametre->setPrixValidationDemandeAbonnement(3);
		
        $manager->persist($parametre);
        $manager->flush();


        $formules = $manager->getRepository(Formules::class)->findAll();
        $services = $manager->getRepository(Service::class)->findAll();

		
		$jour_de_la_semaine = array('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche');
		$type_horaires = array('Matin','Après-midi','Soir');
		for ($i = 0; $i<7; $i++)
        {
			for($j=0;$j<3;$j++)
			{
				$jour = new Jour();
				$jour->setNomJour($jour_de_la_semaine[$i]);
				$jour->setNomTypeHoraire($type_horaires[$j]);
				$manager->persist($jour);
			}
        }
        $manager->flush();
		
		$jours = $manager->getRepository(Jour::class)->findAll();
        // $product = new Product();
        // $manager->persist($product);
        $temps_nom = array('lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche','lundi','mardi','mercredi');
        $type_horaire_nom = array('matin','apres-midi','soir','matin','apres-midi','soir','matin','apres-midi','soir','matin');
        $temps = array('6','5','4','3','2','1','0','6:5','3:0','5:4:2');
        $type_horaire = array('2','1','0','2','1','0','2:1','2:0','1:0','2:1:0');
		$roles = array("ROLE_ARTISAN");
        for ($i = 0; $i<10; $i++)
        {
            $artisan = new Artisan();
            $artisan->setNom($temps_nom[$i]);
            $artisan->setPrenom($type_horaire_nom[$i]);
            $artisan->setRaisonSociale('RaisonSociale' . $i);
            $artisan->setSIREN('1234' . $i);
            $artisan->setTel('07070707' . $i);
            $artisan->setMail('artisan@artisan' . $i);
            $artisan->setDescription('Description' . $i);
            $artisan->setPassword($this->passwordEncoder->encodePassword($artisan,'artisan'));
			$artisan->setRoles($roles);
            $artisan->setNumAssurance('123456' . $i);
            $artisan->setDateInscription(new \DateTime());
            $artisan->setCredit(30 + $i);
            $artisan->setDateDebutArretReception(new \DateTime());
            $artisan->setDateFinGratuite(new \DateTime());
            $artisan->setDateFinArretReception(new \DateTime());
            $artisan->setDateFinEngagement(new \DateTime());
            $artisan->setAvantageArtisan(3 + $i);
            $artisan->setCoordonneeLatitude(46.54 + $i*10**(-1));
            $artisan->setCoordonneeLongitude(0.24);
            $artisan->setAdresseInterventionNumeroArtisan("6");
            $artisan->setAdresseInterventionRueArtisan("Rue de turfu");
            $artisan->setAdresseInterventionVilleArtisan("Aix");
            $artisan->setAdresseInterventionCpArtisan(72000);
            $artisan->setAdresseComplementaireArtisan("étage -1");
			
            $artisan->setIdFormule($formules[1]);
            $artisan->addIdService($services[0]);
            $artisan->addIdService($services[1]);
            $artisan->addIdService($services[2]);
			$artisan->addIdHoraire($jours[$i%7]);
            $manager->persist($artisan);
        }
        $manager->flush();

        $artisans = $manager->getRepository(Artisan::class)->findAll();
		$etat_avancements = $manager->getRepository(EtatAvancement::class)->findAll();
		
        for ($i = 0; $i<10; $i++)
        {
            $demande = new Client();
            $demande->setNomClient('Durant');
            $demande->setPrenomClient('Jean');
            $demande->setTelClient('07070707');
            $demande->setMailClient('artisan@artisan' . $i);
            $demande->setDescriptionSup('Description' . $i);
            $demande->setAdresseInterventionNumero('23'. $i);
            $demande->setAdresseInterventionRue('Rue des bois' . $i);
            $demande->setAdresseInterventionVille('Montpellier' . $i);
            $demande->setAdresseInterventionCp('34000' . $i);
            $demande->setAdresseComplementaireClient('AdresseComplementaire' . $i);
            $demande->setDateProposition(new \DateTime());
            $demande->setDateRealisation(new \DateTime());
            $demande->setIdEtatAvancement($etat_avancements{0});
            $demande->setCoordonneeLongitudeClient(44.56+$i);
            $demande->setCoordonneeLatitudeClient(44.56+$i);
            $demande->setIdService($services[0]);
            $manager->persist($demande);
        }
        $manager->flush();



        $clients = $manager->getRepository(Client::class)->findAll();
		$roles = array("ROLE_ADMIN");
		$admin = new Admin();
		$admin->setMailAdmin("admin@admin");
		$admin->setPassword($this->passwordEncoder->encodePassword($admin,'admin'));
		$admin->setRoles($roles);
		$admin->setReinitialisationMdpAdmin(0);
		$manager->persist($admin);
		/*
        for ($i = 0; $i<10; $i++)
        {
            $admin = new Admin();
            $admin->setMailAdmin("sdfsdf@sdfsf.com".$i);
            $admin->setMotdepasseAdmin('MotdepasseAdm' . $i);
            $admin->setReinitialisationMdpAdmin(0);
            $manager->persist($admin);
        }*/
        $manager->flush();

		$roles_commercial = array("ROLE_COMMERCIAL");
		$commercial = new ServiceCommercial();
        $commercial->setMailCommercial('commercial@commercial');
        $commercial->setPassword($this->passwordEncoder->encodePassword($commercial,'commercial'));
		$commercial->setRoles($roles_commercial);
        $commercial->setReinitialisationMdpCommercial(0);
        $manager->persist($commercial);
			
        /*for ($i = 0; $i<10; $i++)
        {
            $commercial = new ServiceCommercial();
            $commercial->setMailCommercial('commercial@commercial.com' . $i);
            $commercial->setMotdepasseCommercial('MotdepasseCom' . $i);
            $commercial->setReinitialisationMdpCommercial(0);
            $manager->persist($commercial);
        }*/
        $manager->flush();

        for ($i = 0; $i<10; $i++)
        {
            $devis = new Devis();
            $devis->setDateEnvoie(new \DateTime());
            $devis->setFichierJoint('FichierJoint' . $i);
            $devis->setValidationDevis(0);
            $devis->setRefusDevis(0);
            $devis->setAvantageDevis(1);
            $devis->setVisualiseDevis(false);
            $devis->setIdArtisan($artisans[$i]);
            $devis->setIdClient($clients[$i]);
            $manager->persist($devis);
        }
        $manager->flush();
    }
}
