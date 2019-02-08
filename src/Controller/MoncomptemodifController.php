<?php

namespace App\Controller;

use App\Entity\Artisan;
use App\Repository\ArtisanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;

class MoncomptemodifController extends AbstractController
{
    /**
     * @Route("/moncomptemodif/{id}", name="moncomptemodif")
     * @param ArtisanRepository $repo
     * @param Artisan $idArtisan
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ArtisanRepository $repo, Artisan $idArtisan)
    {
        $artisans = $repo->find($idArtisan);
        $entityManager = $this->getDoctrine()->getManager();
        $artisan = $entityManager->getRepository(Artisan::class)->find($idArtisan);
        $artisan->setNom('Nommmm');
        $artisan->setPrenom('Prénom');
        $entityManager->flush();
        return $this->render('moncomptemodif/index.html.twig', [
            'controller_name' => 'MoncomptemodifController',
            'artisan' => $artisans
        ]);
    }

    /**
     * @Route("/moncomptemodif/{id}", name="moncomptemodif")
     * Method({"GET", "POST"})
     * @param Request $request
     * @param Artisan $idArtisan
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(Request $request, Artisan $idArtisan) {
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
            ->add('sauvegarde', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('moncompte', array('id'=> $idArtisan->getIdArtisan()));
        }

        return $this->render('moncomptemodif/index.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
