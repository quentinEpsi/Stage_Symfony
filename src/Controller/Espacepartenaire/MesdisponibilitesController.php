<?php

<<<<<<< HEAD:src/Controller/Espacepartenaire/MesdisponibilitesController.php
namespace App\Controller\Espacepartenaire;
use App\Entity\EtreDispo;
=======
namespace App\Controller;
>>>>>>> dev:src/Controller/MesdisponibilitesController.php
use App\Entity\Horraire;
use App\Entity\Jour;
use App\Entity\Artisan;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class MesdisponibilitesController extends AbstractController
{
    /**
     * @Route("/mesdisponibilites/{id}", name="mesdisponibilites")
     */
    public function mes_disponibilite(Request $request, $id)
    {
        $entityManager = $this->getDoctrine()->getManager(); // Le manageur permet d'inserer un ellement dans la bdd
        $lesJours = $this->getDoctrine()->getRepository(Jour::class)->findAll(); //récupère les jours
        $artisan = $this->getDoctrine()->getRepository(Artisan::class)->find($id); //récupère l'artisan

        $Horraire = new Horraire();

        dump($artisan->getIdHoraire()->getValues()); 
        
        $horaires = $artisan->getIdHoraire()->getValues();
        $y = $lesJours[0]->getIdHoraire();
		foreach($horaires as $horaire)
		{
            $id = $horaire->getIdHoraire();
			if($id == $y)
				$Horraire->setlundiMatin(true);
			else if($id == $y+1)
				$Horraire->setlundiAprem(true);
			else if($id == $y+2)
				$Horraire->setlundiSoir(true);
			else if($id == $y+3)
				$Horraire->setmardiMatin(true);
			else if($id == $y+4)
				$Horraire->setmardiAprem(true);
			else if($id == $y+5)
				$Horraire->setmardiSoir(true);
			else if($id == $y+6)
				$Horraire->setmercrediMatin(true);
			else if($id == $y+7)
				$Horraire->setmercrediAprem(true);
			else if($id == $y+8)
				$Horraire->setmercrediSoir(true);
			else if($id == $y+9)
				$Horraire->setjeudiMatin(true);
			else if($id == $y+10)
				$Horraire->setjeudiAprem(true);
			else if($id == $y+11)
				$Horraire->setjeudiSoir(true);
			else if($id == $y+12)
				$Horraire->setvendrediMatin(true);
			else if($id == $y+13)
				$Horraire->setvendrediAprem(true);
			else if($id == $y+14)
				$Horraire->setvendrediSoir(true);
			else if($id == $y+15)
				$Horraire->setsamediMatin(true);
			else if($id == $y+16)
				$Horraire->setsamediAprem(true);
			else if($id == $y+17)
				$Horraire->setsamediSoir(true);
			else if($id == $y+18)
				$Horraire->setdimancheMatin(true);
			else if($id == $y+19)
				$Horraire->setdimancheAprem(true);
			else
				$Horraire->setdimancheSoir(true);
			
		}
        
        $form = $this->createFormBuilder($Horraire)
            ->add('lundiMatin',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('mardiMatin',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('mercrediMatin',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('jeudiMatin',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('vendrediMatin',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('samediMatin',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('dimancheMatin',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('lundiAprem',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('mardiAprem',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('mercrediAprem',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('jeudiAprem',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('vendrediAprem',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('samediAprem',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('dimancheAprem',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('lundiSoir',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('mardiSoir',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('mercrediSoir',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('jeudiSoir',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('vendrediSoir',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('samediSoir',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('dimancheSoir',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('Valider',SubmitType::class, ['attr' => ['class' => 'btn btn-outline-dark ']])
            ->getForm(); 
        

        $form->handleRequest($request); // je demande au formulaire de gérer la requête   
        
        if($form->isSubmitted() && $form->isValid())  // si le formulaire est valide et que le formulaire a été soumis
        {
            dump($Horraire);
            $i = 0;

            if($Horraire->getlundiMatin() == true)
            {
                $artisan->addIdHoraire($lesJours[$i]);
            } else $artisan->removeIdHoraire($lesJours[$i]);
            $i++;
            if($Horraire->getlundiAprem() == true)
            {
                $artisan->addIdHoraire($lesJours[$i]);
            } else $artisan->removeIdHoraire($lesJours[$i]);
            $i++;
            if($Horraire->getlundiSoir() == true)
            {
                $artisan->addIdHoraire($lesJours[$i]);
            } else $artisan->removeIdHoraire($lesJours[$i]);
            $i++;

            if($Horraire->getmardiMatin() == true)
            {
                $artisan->addIdHoraire($lesJours[$i]);
            } else $artisan->removeIdHoraire($lesJours[$i]);
            $i++;
            if($Horraire->getmardiAprem() == true)
            {
                $artisan->addIdHoraire($lesJours[$i]);
            } else $artisan->removeIdHoraire($lesJours[$i]);
            $i++;
            if($Horraire->getmardiSoir() == true)
            {
                $artisan->addIdHoraire($lesJours[$i]);
            } else $artisan->removeIdHoraire($lesJours[$i]);
            $i++;


            if($Horraire->getmercrediMatin() == true)
            {
                $artisan->addIdHoraire($lesJours[$i]);
            } else $artisan->removeIdHoraire($lesJours[$i]);
            $i++;
            if($Horraire->getmercrediAprem() == true)
            {
                $artisan->addIdHoraire($lesJours[$i]);
            } else $artisan->removeIdHoraire($lesJours[$i]);
            $i++;
            if($Horraire->getmercrediSoir() == true)
            {
                $artisan->addIdHoraire($lesJours[$i]);
            } else $artisan->removeIdHoraire($lesJours[$i]);
            $i++;   


            if($Horraire->getjeudiMatin() == true)
            {
                $artisan->addIdHoraire($lesJours[$i]);
            } else $artisan->removeIdHoraire($lesJours[$i]);
            $i++;
            if($Horraire->getjeudiAprem() == true)
            {
                $artisan->addIdHoraire($lesJours[$i]);
            } else $artisan->removeIdHoraire($lesJours[$i]);
            $i++;
            if($Horraire->getjeudiSoir() == true)
            {
                $artisan->addIdHoraire($lesJours[$i]);
            } else $artisan->removeIdHoraire($lesJours[$i]);
            $i++;


            if($Horraire->getvendrediMatin() == true)
            {
                $artisan->addIdHoraire($lesJours[$i]);
            } else $artisan->removeIdHoraire($lesJours[$i]);
            $i++;
            if($Horraire->getvendrediAprem() == true)
            {
                $artisan->addIdHoraire($lesJours[$i]);
            } else $artisan->removeIdHoraire($lesJours[$i]);
            $i++;
            if($Horraire->getvendrediSoir() == true)
            {
                $artisan->addIdHoraire($lesJours[$i]);
            } else $artisan->removeIdHoraire($lesJours[$i]);
            $i++;


            if($Horraire->getsamediMatin() == true)
            {
                $artisan->addIdHoraire($lesJours[$i]);
            } else $artisan->removeIdHoraire($lesJours[$i]);
            $i++;
            if($Horraire->getsamediAprem() == true)
            {
                $artisan->addIdHoraire($lesJours[$i]);
            } else $artisan->removeIdHoraire($lesJours[$i]);
            $i++;
            if($Horraire->getsamediSoir() == true)
            {
                $artisan->addIdHoraire($lesJours[$i]);
            } else $artisan->removeIdHoraire($lesJours[$i]);
            $i++;


            if($Horraire->getdimancheMatin() == true)
            {
                $artisan->addIdHoraire($lesJours[$i]);
            } else $artisan->removeIdHoraire($lesJours[$i]);
            $i++;
            if($Horraire->getdimancheAprem() == true)
            {
                $artisan->addIdHoraire($lesJours[$i]);
            } else $artisan->removeIdHoraire($lesJours[$i]);
            $i++;
            if($Horraire->getdimancheSoir() == true)
            {
                $artisan->addIdHoraire($lesJours[$i]);
            } else $artisan->removeIdHoraire($lesJours[$i]);
            $i++;


            $entityManager->persist($artisan);
            $entityManager->flush();
        }
        return $this->render('mesdisponibilites/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
