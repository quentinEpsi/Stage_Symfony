<?php

namespace App\Controller\Commercial;

use App\Entity\Artisan;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CommercialmodifprestataireController extends AbstractController
{
    /**
     * @Route("/commercial/commercialmodifprestataire/{id}", name="commercialmodifprestataire")
     */
    public function index()
    {
        return $this->render('commercial/commercialmodifprestataire/index.html.twig', [
            'controller_name' => 'CommercialmodifprestataireController',
        ]);
    }

    /**
     * @Route("/commercialprestatairedetail/{id}", name="commercialmodifprestataire")
     * Method({"GET", "POST"})
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(Request $request, $id){
        $editartisan = new Artisan();
        $editartisan = $this->getDoctrine()->getRepository(Artisan::class)->find($id);

        $form = $this->createFormBuilder($editartisan)
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('tel', TelType::class)
            ->add('mail', EmailType::class)
            ->add('description', TextType::class)
            ->add('credit', TextType::class)
            ->add('sauvegarde', SubmitType::class, array(
                'label' => 'Sauvegarder les modifications',
                'attr' => array('class' => 'btn btn-primary')
            ))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('commercialprestatairedetail', array('id'=> $id));
        }

        return $this->render('commercial/commercialmodifprestataire/index.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
