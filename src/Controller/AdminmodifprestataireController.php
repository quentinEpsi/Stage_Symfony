<?php

namespace App\Controller;

use App\Entity\Artisan;
use App\Repository\ArtisanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminmodifprestataireController extends AbstractController
{
    /**
     * @Route("/admin/adminmodifprestataire/{id}", name="adminmodifprestataire")
     * @param ArtisanRepository $repo
     * @param Artisan $idArtisan
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ArtisanRepository $repo, Artisan $idArtisan)
    {
        $artisans = $repo->find($idArtisan);
        return $this->render('admin/adminmodifprestataire/index.html.twig', [
            'controller_name' => 'AdminmodifprestataireController',
            'artisans' => $artisans
        ]);
    }

    /**
     * @Route("/admin/adminmodifprestataire/{id}", name="adminmodifprestataire")
     * Method({"GET", "POST"})
     * @param Request $request
     * @param Artisan $idArtisan
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(Request $request, Artisan $idArtisan){
        $editartisan = new Artisan();
        $editartisan = $this->getDoctrine()->getRepository(Artisan::class)->find($idArtisan);

        $form = $this->createFormBuilder($editartisan)
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('raisonSociale', TextType::class)
            ->add('siren', TextType::class)
            ->add('tel', TelType::class)
            ->add('mail', EmailType::class)
            ->add('description', TextType::class)
            ->add('numAssurance', TextType::class)
            ->add('credit', TextType::class)
            ->add('coordonneeLatitude', TextType::class)
            ->add('coordonneeLongitude', TextType::class)
            ->add('sauvegarde', SubmitType::class, array(
                'label' => 'Sauvegarder les modifications',
                'attr' => array('class' => 'btn btn-primary')
            ))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('adminprestatairedetail', array('id'=> $idArtisan->getIdArtisan()));
        }

        return $this->render('admin/adminmodifprestataire/index.html.twig', array(
            'form' => $form->createView()
        ));
    }
}




