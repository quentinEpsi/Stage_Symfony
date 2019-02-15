<?php

namespace App\Controller;

use App\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CommercialmodifdemandesController extends AbstractController
{
    /**
     * @Route("/commercial/commercialmodifdemandes/{id}", name="commercialmodifdemandes")
     */
    public function index()
    {
        return $this->render('commercial/commercialmodifdemandes/index.html.twig', [
            'controller_name' => 'CommercialmodifdemandesController',
        ]);
    }

    /**
     * @Route("/commercial/commercialmodifdemandes/{id}", name="commercialmodifdemandes")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function show($id)
    {
        $infoClient = $this->getDoctrine()->getRepository(Client::class)->find($id);
        $repo = $infoClient->getIdArtisan();
        $infoArtisans = $repo->getValues();
        return $this->render('commercial/commercialmodifdemandes/index.html.twig', [
            'infoClient' => $infoClient,
            'infoArtisans' => $infoArtisans
        ]);
    }

    /**
     * @Route("/commercial/commercialmodifdemandes/{id}", name="commercialmodifdemandes")
     * Method({"GET", "POST"})
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(Request $request,$id){
        $editdemandes = new Client();
        $editdemandes = $this->getDoctrine()->getRepository(Client::class)->find($id);

        $form = $this->createFormBuilder($editdemandes)
            ->add('nomClient', TextType::class)
            ->add('prenomClient', TextType::class)
            ->add('adresseInterventionNumero', TextType::class)
            ->add('adresseInterventionRue', TextType::class)
            ->add('adresseInterventionVille', TextType::class)
            ->add('adresseInterventionCp', TextType::class)
            ->add('telClient', TelType::class)
            ->add('mailClient', EmailType::class)
            ->add('descriptionSup', TextType::class)
            ->add('sauvegarde', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('commercialdemandesdetail', array('id'=> $id));
        }

        return $this->render('commercial/commercialmodifdemandes/index.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
