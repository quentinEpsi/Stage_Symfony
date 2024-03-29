<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminmodifdemandesController extends AbstractController
{
    /**
     * @Route("/admin/adminmodifdemandes", name="adminmodifdemandes")
     */
    public function index()
    {
        return $this->render('admin/adminmodifdemandes/index.html.twig', [
            'controller_name' => 'AdminmodifdemandesController',
        ]);
    }

    /**
     * @Route("/admin/adminmodifdemandes/{id}", name="adminmodifdemandes")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function show($id)
    {
        $infoClient = $this->getDoctrine()->getRepository(Client::class)->find($id);
        $repo = $infoClient->getIdArtisan();
        $infoArtisans = $repo->getValues();
        return $this->render('admin/adminmodifdemandes/index.html.twig', [
            'controller_name' => 'AdminmodifdemandesController',
            'infoClient' => $infoClient,
            'infoArtisans' => $infoArtisans
        ]);
    }

    /**
     * @Route("/admin/adminmodifdemandes/{id}", name="adminmodifdemandes")
     * Method({"GET", "POST"})
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(Request $request, $id){
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

            return $this->redirectToRoute('admindemandesdetail', array('id'=> $id));
        }

        return $this->render('admin/adminmodifdemandes/index.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
