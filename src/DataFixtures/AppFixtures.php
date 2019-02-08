<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Artisan;
use App\Entity\Client;
use App\Entity\Commercial;
use App\Entity\Devis;
use App\Entity\Formules;
use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i<3; $i++)
        {
            $service = new Service();
            $service->setNomService('NomService' . $i);
            $manager->persist($service);
        }
        $manager->flush();

        $formule1 = new Formules();
        $formule1->setNomFormule('Gratuit');
        $manager->persist($formule1);

        $formule2 = new Formules();
        $formule2->setNomFormule('Esprit Libre');
        $manager->persist($formule2);

        $formule3 = new Formules();
        $formule3->setNomFormule('Abonnement');
        $manager->persist($formule3);
        $manager->flush();

        $formules = $manager->getRepository(Formules::class)->findAll();
        $services = $manager->getRepository(Service::class)->findAll();

        for ($i = 0; $i<10; $i++)
        {
            $artisan = new Artisan();
            $artisan->setNom('Martin' . $i);
            $artisan->setPrenom('Mystere' . $i);
            $artisan->setRaisonSociale('RaisonSociale' . $i);
            $artisan->setSIREN('1234' . $i);
            $artisan->setTel('0707070707' . $i);
            $artisan->setMail('artisan@artisan.fr' . $i);
            $artisan->setDescription('Description' . $i);
            $artisan->setMotdepasse('MotdepasseArtisan' . $i);
            $artisan->setNumAssurance('123456' . $i);
            $artisan->setDateInscription(new \DateTime());
            $artisan->setCredit(30 . $i);
            $artisan->setDisponibilite(24 . $i);
            $artisan->setDateDebutGratuite(new \DateTime());
            $artisan->setTempsRestantGratuite(new \DateTime());
            $artisan->setDateDebutArretReception(new \DateTime());
            $artisan->setDateFinArretReception(new \DateTime());
            $artisan->setDateFinEngagement(new \DateTime());
            $artisan->setAvantage(3 . $i);
            $artisan->setReinitialisationMdpArtisan('ChangeMdp' . $i);
            $artisan->setValidationArtisan('validationArtisan' . $i);
            $artisan->setValidationAssurance('validationAssurance' . $i);
            $artisan->setCoordonneeLatitude( 47.54 . $i);
            $artisan->setCoordonneeLongitude(0.24 . $i);
            $artisan->setIdFormule($formules[1]);
            $artisan->addIdService($services[0]);
            $artisan->addIdService($services[1]);
            $artisan->addIdService($services[2]);
            $manager->persist($artisan);
        }
        $manager->flush();

        for ($i = 0; $i<10; $i++)
        {
            $demande = new Client();
            $demande->setNomClient('Durant' . $i);
            $demande->setPrenomClient('Jean' . $i);
            $demande->setTelClient('0707070707' . $i);
            $demande->setMailClient('artisan@artisan.fr ' . $i);
            $demande->setDescriptionSup('Description' . $i);
            $demande->setAdresseInterventionNumero('23'. $i);
            $demande->setAdresseInterventionRue('Rue des bois' . $i);
            $demande->setAdresseInterventionVille('Montpellier' . $i);
            $demande->setAdresseInterventionCp('34000' . $i);
            $demande->setAdresseComplementaireClient('AdresseComplementaire' . $i);
            $demande->setDateProposition(new \DateTime());
            $demande->setDateRealisation(new \DateTime());
            $demande->setEtatAvancement('EtatAvancement' . $i);
            $demande->setListeIdArtisan('ListeIdArtisan' . $i);
            $manager->persist($demande);
        }
        $manager->flush();

        for ($i = 0; $i<10; $i++)
        {
            $admin = new Admin();
            $admin->setMailAdmin('admin@admin.adm' . $i);
            $admin->setMotdepasseAdmin('MotdepasseAdm' . $i);
            $admin->setReinitialisationMdpAdmin('ChangeMdp' . $i);
            $manager->persist($admin);
        }
        $manager->flush();

        for ($i = 0; $i<10; $i++)
        {
            $commercial = new Commercial();
            $commercial->setMailCommercial('commercial@commercial.com' . $i);
            $commercial->setMotdepasseCommercial('MotdepasseCom' . $i);
            $commercial->setReinitialisationMdpCommercial('ChangeMdp' . $i);
            $manager->persist($commercial);
        }
        $manager->flush();

        for ($i = 0; $i<10; $i++)
        {
            $devis = new Devis();
            $devis->setDateEnvoie(new \DateTime());
            $devis->setFichierJoint('FichierJoint' . $i);
            $devis->setNomDevis('Objet' . $i);
            $manager->persist($devis);
        }
        $manager->flush();
    }
}
