<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Notification\ContactNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     * @return Response
     */
    public function index(Request $request, ContactNotification $notification) : Response  // j'injecte la request de l'utilisateur
    {
        $contact = new Contact();   //Création du nouveau contact
        $form = $this->createForm(ContactType::class, $contact);  // création du formulaire, je lui donne le formulaire que je veux crée ainsi que notre contact
        $form->handleRequest($request); // je demande au formulaire de gérer la requête

        if($form->isSubmitted() && $form->isValid()){
            $notification->notify($contact);
            $this->addFlash('success', 'Votre email a bien été envoyé');
           // return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig',[
            'current_menu' => 'contact',
            'form'         => $form->createView() //j'envoie à ma vue
        ]);
    }

}
