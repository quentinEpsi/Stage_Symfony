<?php

namespace App\DataFixtures;

use App\Entity\Artisan;
use App\Entity\Client;
use App\Entity\Devis;
use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i<10; $i++)
        {
            $artisan = new Artisan();
            $artisan->setNom('NomArtisan ' . $i);
            $artisan->setPrenom('PrenomArtisan ' . $i);
            $artisan->setRaisonSociale('Raison ' . $i);
            $artisan->setSIREN('1234 ' . $i);
            $artisan->setTel('1234567890 ' . $i);
            $artisan->setMail('artisan@artisan.fr ' . $i);
            $artisan->setDescription('exemple de description ' . $i);
            $artisan->setMotdepasse('mdp ' . $i);
            $artisan->setNumAssurance('123456 ' . $i);
            $artisan->setDateInscription(new \DateTime());
            $artisan->setCredit(30 . $i);
            $artisan->setDisponibilite(24 . $i);
            $artisan->setDateDebutGratuite(new \DateTime());
            $artisan->setTempsRestantGratuite(new \DateTime());
            $artisan->setDateDebutArretReception(new \DateTime());
            $artisan->setDateFinArretReception(new \DateTime());
            $artisan->setDateFinEngagement(new \DateTime());
            $artisan->setAvantage(3 . $i);
            $artisan->setReinitialisationMdpArtisan('reinitialisation mdp ' . $i);
            $artisan->setValidationArtisan('validation artisan ' . $i);
            $artisan->setValidationAssurance('validation assurance ' . $i);
            $artisan->setCoordonneeLatitude(0.24 . $i);
            $artisan->setCoordonneeLongitude(47.54 . $i);
            $manager->persist($artisan);
        }
        $manager->flush();

        for ($i = 0; $i<4; $i++)
        {
            $demande = new Client();
            $demande->setNomClient('Durant ' . $i);
            $demande->setPrenomClient('Jean ' . $i);
            $demande->setTelClient('12345678' . $i);
            $demande->setMailClient('artisan@artisan.fr ' . $i);
            $demande->setDescriptionSup('artisan@artisan.fr ' . $i);
            $demande->setAdresseInterventionNumero('23 '. $i);
            $demande->setAdresseInterventionRue('Rue des bois ' . $i);
            $demande->setAdresseInterventionVille('ville ' . $i);
            $demande->setAdresseInterventionCp('34000' . $i);
            $demande->setAdresseComplementaireClient('complement ' . $i);
            $demande->setDateProposition(new \DateTime());
            $demande->setDateRealisation(new \DateTime());
            $demande->setEtatAvancement('exemple de description ' . $i);
            $demande->setListeIdArtisan('123456 ' . $i);
            $manager->persist($demande);
        }
        $manager->flush();

        for ($i = 0; $i<4; $i++)
        {
            $service = new Service();
            $service->setNomService('service ' . $i);
            $manager->persist($service);
        }
        $manager->flush();
    }
}
