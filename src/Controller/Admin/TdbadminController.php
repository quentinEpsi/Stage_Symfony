<?php

namespace App\Controller\Admin;

use App\Entity\Service;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;

class TdbadminController extends AbstractController
{
    /**
     * @Route("/tdbadmin", name="tdbadmin")
     * @param ServiceRepository $repo
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ServiceRepository $repo)
    {
        $service=$repo->findAll();
        return $this->render('tdbadmin/index.html.twig', [
            'controller_name' => 'TdbadminController',
            'services'=>$service
        ]);

    }
    /*public function add(){
        $service=new Service();

        $form=$this->createFormBuilder($service)
            ->add('service',TextType::class
                ->add('button',SubmitType::class)
                ->
            );
        dump($service);


    }*/
}
