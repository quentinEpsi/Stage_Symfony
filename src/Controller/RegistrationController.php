<?php

namespace App\Controller;

use App\Entity\Artisan;
use App\Form\RegistrationFormType;
use Doctrine\DBAL\Types\TextType;
use function Sodium\add;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints\Email;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $artisan = new Artisan();
        $artisan->setPrenom("try");
        $artisan->setNom("try");
        $artisan->setRaisonSociale("try");
        $artisan->setSiren("try");
        $artisan->setTel("try");
        $artisan->setDescription("try");
        $artisan->setNumAssurance("ty");
        $artisan->setDateInscription(new \DateTime('now'));
        $artisan->setCredit("0");
        $artisan->setDisponibilite("22");
        $artisan->setDateDebutArretReception(new \DateTime('now'));
        $artisan->setDateFinArretReception(new \DateTime('now'));
        $artisan->setDateFinEngagement(new \DateTime('now'));
        $artisan->setAvantage("2");
        $artisan->setReinitialisationMdpArtisan("2");
        $artisan->setValidationAssurance("2");
        $artisan->setValidationArtisan("2");
        $artisan->setDateDebutGratuite(new \DateTime());
        $artisan->setTempsRestantGratuite(new \DateTime());
        $artisan->setDateDebutArretReception(new \DateTime());
        $artisan->setDateFinArretReception(new \DateTime());
        $artisan->setDateFinEngagement(new \DateTime());
        $artisan->setValidationArtisan('validation artisan ');
        $artisan->setValidationAssurance('validation assurance ');
        $artisan->setCoordonneeLatitude(0.24 );
        $artisan->setCoordonneeLongitude(47.54 );
        $artisan->setIdFormule(null);
        $form = $this->createFormBuilder($artisan)
            ->add('mail', EmailType::class)
            ->add('motdepasse', PasswordType::class)
            ->add('nom')


        ->add('Valider', SubmitType::class)->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $artisan->setMotdepasse($form->get('motdepasse')->getData()
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($artisan);
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $this->redirectToRoute('home');


        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
