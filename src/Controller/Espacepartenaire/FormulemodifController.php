<?php

namespace App\Controller\Espacepartenaire;

use App\Entity\Formuleform;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FormulemodifController extends AbstractController
{
    /**
     * @Route("/artisan/formulemodif", name="formulemodif")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(Request $request){

        $artisan = $this->get('security.token_storage')->getToken()->getUser();

        $Formuleform = new Formuleform();

        $form = $this->createFormBuilder($Formuleform)
            ->add('Formulegratuite',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('Formuleespritlibre',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('Formuleabonnement',CheckboxType::class, array( 'label' => false, 'required' => false))
            ->add('valider', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);
        dump($request);
        dump($Formuleform);
        if($form->isSubmitted() && $form->isValid()) {

            if ($Formuleform->getFormuleabonnement()){
                return $this->redirectToRoute('paypalpaiement', ['prix'=>4.99]);
            }
            /*$entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($Formuleform);
            $entityManager->flush();

            return $this->redirectToRoute('maformule');*/
        }

        return $this->render('formulemodif/index.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
