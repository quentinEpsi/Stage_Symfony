<?php

namespace App\Controller;

use App\Entity\Artisan;
use App\Entity\ReinitialisationMdp;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class NewpasswordController extends AbstractController
{
    /**
     * @Route("/newpassword/{token}", name="newpassword")
     */
    public function index($token, Request $request, UserPasswordEncoderInterface $encoder)
    {
        $veriftoken = $this->getDoctrine()->getRepository(ReinitialisationMdp::class)->findOneBy(['token' => $token]);
        $artisan = $veriftoken->getIdArtisan();

        if ($veriftoken == null) {
            return $this->redirectToRoute('home');
        }

        $form = $this->createFormBuilder($artisan)										// Création du formulaire
        ->add('motdepasse',PasswordType::class)
            ->add('verif_motdepasse', PasswordType::class)
            ->add('valider', SubmitType::class)
            ->getForm();

        ////////// Prise en charge de la validation du formulaire //////////
        $form->handleRequest($request);													// Traitement du formulaire
        // Traitement du formulaire
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $encoded = $encoder->encodePassword($artisan, $artisan->getMotdepasse());
            $artisan->setPassword($encoded);
            $entityManager->persist($artisan);
            $entityManager->flush();
            $deltoken = $this->getDoctrine()->getRepository(ReinitialisationMdp::class)->findOneBy(['token' => $token]);
            $entityManager->remove($deltoken); //suppr le token
            $entityManager->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('newpassword/index.html.twig', [
            'controller_name' => 'NewpasswordController', 'form' => $form -> createView()
        ]);
    }
}
