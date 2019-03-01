<?php

namespace App\Controller\Admin;

use App\Entity\Service;
use App\Entity\Parametre;

use App\Form\ServiceType;
use App\Form\ParametreType;

use App\Repository\ServiceRepository;
use App\Repository\ParametreRepository;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TdbadminController extends AbstractController
{
    /**
     * @var ServiceRepository
     */
    private $repository;

    /**
     * @var ParametreRepository
     */
    private $repositoryParam;

    /**
     * @var ObjectManager
     */
    private $om;

    public function __construct(ServiceRepository $repo,ObjectManager $om,ParametreRepository $repoParam)
    {
        $this->repository=$repo;
        $this->repositoryParam=$repoParam;
        $this->om = $om;
    }



    /**
     * @Route("/admin/tdbadmin", name="tdbadmin")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $service=$this->repository->findAll();
        $parametre=$this->repositoryParam->findAll();

        return $this->render('tdbadmin/index.html.twig', [
            'controller_name' => 'TdbadminController',
            'services'=>$service,
            'parametre'=>$parametre
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

    
    /**
     * @Route ("/tdbadmin/editParametre/{id} ",name="tdbadmin.parametre.edit")
     * @param Parametre $parametreEntity
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
	public function editParametre(Parametre $parametreEntity,\Symfony\Component\HttpFoundation\Request $request){
		$parametre=$this->repositoryParam->findAll();
		$form=$this->createForm(ParametreType::class,$parametreEntity);
		$form->handleRequest($request);

			if ($form->isSubmitted()&& $form->isValid()){
				$this->om->flush();
				return $this->redirectToRoute('tdbadmin');
			}


			return $this->render('tdbadmin/editParametre.html.twig',[
			   'parametre'=>$parametre,
				'form'=>$form->createView()
		]);
	}
}
