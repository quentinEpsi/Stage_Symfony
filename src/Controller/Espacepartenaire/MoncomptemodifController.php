<?php

namespace App\Controller\Espacepartenaire;

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
     * @Route("/artisan/moncomptemodif", name="moncomptemodif")
     * @param Artisan $idArtisan
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index($id)
    {
        $artisans = $this->get('security.token_storage')->getToken()->getUser();

        return $this->render('moncomptemodif/index.html.twig', [
            'controller_name' => 'MoncomptemodifController',
            'artisan' => $artisans
        ]);
    }

    /**
     * @Route("/artisan/moncomptemodif", name="moncomptemodif")
     * Method({"GET", "POST"})
     * @param Request $request
     * @param Artisan $idArtisan
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(Request $request) {
        $editartisan = $this->get('security.token_storage')->getToken()->getUser();

        $form = $this->createFormBuilder($editartisan)
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('siren', TextType::class)
            ->add('tel', TelType::class)
            ->add('mail', EmailType::class)
            ->add('description', TextType::class)
            ->add('sauvegarde', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('moncompte');
        }

        return $this->render('moncomptemodif/index.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
