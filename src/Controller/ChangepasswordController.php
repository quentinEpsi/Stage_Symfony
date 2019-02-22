<?php

namespace App\Controller;

use App\Entity\Artisan;
use App\Entity\ReinitialisationMdp;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

class ChangepasswordController extends AbstractController
{
    /**
     * @Route("/changepassword", name="changepassword")
     * @param Request $request
     * @param \Swift_Mailer $mailer
     * @param TokenGeneratorInterface $tokenGenerator
     * @return Response
     */
    public function forgottenPassword(
        Request $request,
        \Swift_Mailer $mailer,
        TokenGeneratorInterface $tokenGenerator
    ): Response
    {
        $test = 2;
        dump($test);
        $artisan = new Artisan();

        $form = $this->createFormBuilder($artisan)										// Création du formulaire
            ->add('mail',EmailType::class)
            ->add('valider', SubmitType::class)
            ->getForm();

        ////////// Prise en charge de la validation du formulaire //////////
        $form->handleRequest($request);													// Traitement du formulaire
        dump($artisan);
        // Traitement du formulaire
        if($form->isSubmitted() && $form->isValid()) {
            $email = $artisan->getMail();
            $entityManager = $this->getDoctrine()->getManager();
            $user = $entityManager->getRepository(Artisan::class)->findOneBy(array('mail'=>$email));
            dump($user);
            /* @var $user Artisan */
            $token = $tokenGenerator->generateToken();
            if ($user === null) {
                dump("Marche pas");
                $this->addFlash('danger', 'Cette adresse e-mail n\'existe pas');
            }
            else
                {

                dump($token);
                $mdp = new ReinitialisationMdp();
                dump($mdp);
                $mdp->setToken($token);
                dump($mdp);
                $mdp->setIdArtisan($user);
                $entityManager->persist($mdp); //Prépare objet créé pour le mettre en bdd
                    $entityManager->flush(); //Met l'objet en bdd
                    $this->addFlash('danger', 'Un e-mail de réinitialisation du mot de passe a été envoyé à '. $artisan->getMail() );
            }

            try{
                $entityManager->flush();
            } catch (\Exception $e) {
                $this->addFlash('warning', $e->getMessage());
            }

            $url = $this->generateUrl('changepassword', array('token' => $token), UrlGeneratorInterface::ABSOLUTE_URL);

            $message = (new \Swift_Message('Forgot Password'))
                ->setFrom('no-reply@serrurierdemaville.fr')
                ->setTo($artisan->getMail())
                ->setBody(
                    "blablabla voici le token pour reseter votre mot de passe : " . $url,
                    'text/html'
                );


            $mailer->send($message);
            dump($mailer);

            $this->addFlash('notice', 'Mail envoyé');

        }

        return $this->render('changepassword/index.html.twig', ['form' => $form -> createView()]);
    }
}
