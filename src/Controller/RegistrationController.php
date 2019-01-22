<?php

namespace App\Controller;

use App\Entity\Artisan;
use App\Form\RegistrationFormType;
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
        $form = $this->createFormBuilder($artisan)
            ->add('mail', EmailType::class)
            ->add('motdepasse', PasswordType::class)

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
