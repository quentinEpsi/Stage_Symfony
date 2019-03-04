<?php

namespace App\Controller\Espacepartenaire;

use App\Entity\Formuleform;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Artisan;
use App\Entity\Parametre;

class FormulemodifController extends AbstractController
{
    /**
     * @Route("/artisan/formulemodif", name="formulemodif")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(){

        $artisan = $this->get('security.token_storage')->getToken()->getUser();

        $param = $this->getDoctrine()->getRepository(Parametre::class)->findAll()[0];
        dump($param);

        return $this->render('formulemodif/index.html.twig', [
            'param' => $param,
        ]);
    }
}
