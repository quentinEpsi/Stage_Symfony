<?php

namespace App\DataFixtures;

use App\Entity\Artisan;
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
    }
}
