<?php

namespace App\Controller\Espacepartenaire;

use App\Entity\Client;
use App\Entity\Devis;
use App\Entity\Artisan;
use App\Entity\Choisir;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class MesDevisDetailController extends AbstractController
{
    /**
     * @Route("/artisan/mondevisdetail/{id}", name="mondevisdetail")
     */
    public function index($id)
    {
        $artisan= $this->get('security.token_storage')->getToken()->getUser();
        $devis = $this->getDoctrine()->getRepository(Devis::class)->find($id);
        dump($devis);
        if($devis->getIdArtisan() == $artisan) $acces = true; else $acces = false;

        if($acces)
        {
        date_default_timezone_set ( "Europe/Paris" );  

        $devis = $this->getDoctrine()->getRepository(Devis::class)->find($id);

        $client = $devis->getIdCLient();
        $artisan = $devis->getIdArtisan();
        $dateDevis = $devis->getDateEnvoie()->format('d-m-Y');
        $dateRealisation = $client->getDateRealisation()->format('d-m-Y H:i');
        $fichierJoint = $devis->getFichierJoint();
        $chaineFichierJoint="";
        $fichierJointCoupe = explode("-", $fichierJoint);
        for($i=1;$i<count($fichierJointCoupe);$i++)
        {
            $chaineFichierJoint = $chaineFichierJoint.$fichierJointCoupe[$i].'-';
        }
        $chaineFichierJoint= substr($chaineFichierJoint, 0, -1);
        $idArtisan = $artisan->getIdArtisan();  
         
        return $this->render('mondevisdetail/index.html.twig', [
            'controller_name' => 'MesDevisDetailController',
            'Devis' => $devis,
            'Client'=> $client,
            'dateDevis'=>$dateDevis,
            'dateRealisation'=>$dateRealisation,
            'fichierJointCoupe'=>$chaineFichierJoint,
            'idArtisan'=>$idArtisan
       ]);
    } else return $this->redirectToRoute('mesdevis');
    }
}