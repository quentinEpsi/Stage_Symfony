<?php

namespace App\Controller\Espacepartenaire;

use App\Entity\Client;
use App\Entity\Choisir;
use App\Entity\Devis;
use App\Entity\Artisan;

use App\Service\FileUploader;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class CreationDevisController extends AbstractController
{
    /**
     * @Route("/artisan/mesdemandes/macreationdevis/{id}", name="macreationdevis")
     */ 
    public function index(Request $request, $id, FileUploader $fileUploader)
    {
        $artisan= $this->get('security.token_storage')->getToken()->getUser();
        $client = $this->getDoctrine()->getRepository(Client::class)->find($id);

        $leChoisir = $this->getDoctrine()->getRepository(Choisir::class)->findleChoix($id,$artisan->getIdArtisan())[0];
        $entityManager = $this->getDoctrine()->getManager();
        $leChoisir->setVisualise(1);
        $entityManager->persist($leChoisir);
        $entityManager->flush();

        $devis = $this->getDoctrine()->getRepository(Choisir::class)->findleChoix($client->getIdClient(), $artisan->getIdArtisan());
        dump($devis);

        if(count($devis) != 0)
        {
            date_default_timezone_set ( "Europe/Paris" );  
        
        $entityManager = $this->getDoctrine()->getManager(); // Le manageur permet d'inserer un ellement dans la bdd
        $client = $this->getDoctrine()->getRepository(Client::class)->find($id); //récupère le client
        $devis = new Devis();   //Création du nouveau devis
        $form = $this->createFormBuilder($devis)
        //->add('fichierJoint', TextType::class)
        ->add('fichierJoint', FileType::class, ['label' => '','mapped' => false])
        ->add('Valider',SubmitType::class, ['attr' => ['class' => 'btn btn-success ']])
        ->getForm();
        
        $form->handleRequest($request); // je demande au formulaire de gérer la requête

         if($form->isSubmitted() && $form->isValid())
         {
            $devis->setDateEnvoie(new \DateTime('now'));
            $devis->setValidationDevis(0);
            $devis->setAvantageDevis(0);
            $devis->setRefusDevis(0);
            $devis->setVisualiseDevis(0);
            $devis->setIdArtisan($artisan);
            $devis->setIdClient($client);
            /*$file = $devis->getdevisFichierJoint();*/
            dump($devis);
            $file = $request->files->get('form');
            dump($file);
            dump($request);
            dump(uniqid());
            /*$fileName = md5(uniqid()).'.'.$file->guessExtension();*/
      
            /*$file->move($this->getParameter('devisFichierJoint_directory'),$fileName);*/
            
            /*$element = pathinfo($file);*/
            $fileName = $fileUploader->upload($file['fichierJoint'],$artisan->getIdArtisan());
           /*$devis->setdevisFichierJoint($fileName);*/
          
            $devis->setFichierJoint($fileName);
           
            $entityManager->persist($devis);
            $entityManager->flush();
        }
          
          
        
         
        return $this->render('macreationdevis/index.html.twig', [
            'controller_name' => 'CreationDevisController',
            'Client'=> $client,
            'form' => $form->createView()
           
       ]);
     } else return $this->redirectToRoute('mesdemandes');


    
    }

}