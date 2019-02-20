<?php

namespace App\Controller\Admin;

use App\Entity\Service;
use App\Form\ServiceType;
use App\Repository\ServiceRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectManagerAware;
use Doctrine\ORM\EntityManager;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TdbadminController extends AbstractController
{
    /**
     * @var ServiceRepository
     */
    private $repository;
    /**
     * @var ObjectManager
     */
    private $om;

    public function __construct(ServiceRepository $repo,ObjectManager $om)
    {
        $this->repository=$repo;
        $this->om = $om;
    }



    /**
     * @Route("/tdbadmin", name="tdbadmin")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $service=$this->repository->findAll();
        return $this->render('tdbadmin/index.html.twig', [
            'controller_name' => 'TdbadminController',
            'services'=>$service
        ]);

    }

    /**
     * @Route ("/tdbadmin/edit/{id} ",name="tdbadmin.service.edit")
     * @param Service $serviceEntity
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
public function edit(Service $serviceEntity,\Symfony\Component\HttpFoundation\Request $request){
    $services=$this->repository->findAll();
    $form=$this->createForm(ServiceType::class,$serviceEntity);
    $form->handleRequest($request);

        if ($form->isSubmitted()&& $form->isValid()){
            $this->om->flush();
            return $this->redirectToRoute('tdbadmin');
        }


        return $this->render('tdbadmin/edit.html.twig',[
           'services'=>$services,
            'form'=>$form->createView()
    ]);
}

    /**
     * @Route ("/tdbadmin/create",name="tdbadmin.service.create")
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
public function create(\Symfony\Component\HttpFoundation\Request $request){
    $ServiceCreated= new Service();
    $form=$this->createForm(ServiceType::class,$ServiceCreated);
    $form->handleRequest($request);

    if ( $form->isSubmitted() && $form->isValid()){
    $this->om->persist($ServiceCreated);
    $this->om->flush();
    return $this->redirectToRoute('tdbadmin');
    }

    return $this->render('tdbadmin/create.html.twig',[
        'services'=>$ServiceCreated,
        'form'=>$form->createView()
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
