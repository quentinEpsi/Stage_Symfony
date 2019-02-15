<?php

namespace App\Controller;
use App\Entity\EtreDispo;
use App\Entity\Horraire;
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

        $artisan = $this->getDoctrine()->getRepository(Artisan::class)->find($id); //récupère l'artisan

        $Horraire = new Horraire();

        $form = $this->createFormBuilder($Horraire)                      // Création du formulaire
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
            ->add('Valider',SubmitType::class)
            ->getForm(); 

        $form->handleRequest($request); // je demande au formulaire de gérer la requête   
        
        if($form->isSubmitted() && $form->isValid())  // si le formulaire est valide et que le formulaire a été soumis
        {
            dump($Horraire);
        }
        return $this->render('mesdisponibilites/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
