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
        for ($i = 0; $i<4; $i++)
        {
            $artisan = new Artisan();
            $artisan->setNom('Artisan ' . $i);
            $artisan->setRaisonSociale('Raison ' . $i);
            $artisan->setSIREN('1234 ' . $i);
            $artisan->setTel('1234567890 ' . $i);
            $artisan->setMail('artisan@artisan.fr ' . $i);
            $artisan->setDescription('exemple de description ' . $i);
            $artisan->setMotdepasse('mdp ' . $i);
            $artisan->setNumAssurance('123456 ' . $i);
            $artisan->setDateFinArretReception(new \DateTime());
            $artisan->setDateInscription(new \DateTime());
            $artisan->setCredit(30 . $i);
            $artisan->setDevisMax(30 . $i);
            $artisan->setDisponibilite(24 . $i);
            $artisan->setDateDebutArretReception(new \DateTime());
            $artisan->setDateFinEngagement(new \DateTime());
            $artisan->setAvantage(3 . $i);
            $artisan->setReinitialisationMdpArtisan('reinitialisation mdp ' . $i);
            $artisan->setValidationArtisan('validation artisan ' . $i);
            $artisan->setValidationAssurance('validation assurance ' . $i);
            $manager->persist($artisan);
        }
        $manager->flush();

        for ($i = 0; $i<4; $i++)
        {
            $demande = new Client();
            $demande->setAdresseIntervention('adresse intervention ' . $i);
            $demande->setDateProposition(new \DateTime());
            $demande->setDateRealisationDebut(new \DateTime());
            $demande->setDateRealisationFin(new \DateTime());
            $demande->setDescriptionSup('artisan@artisan.fr ' . $i);
            $demande->setEtatAvancement('exemple de description ' . $i);
            $demande->setListeIdArtisan('123456 ' . $i);
            $demande->setTelClient('1234567890 ' . $i);
            $demande->setMailClient('artisan@artisan.fr ' . $i);
            $demande->setNomClient('Durant ' . $i);
            $demande->setPrenomClient('Jean ' . $i);
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
