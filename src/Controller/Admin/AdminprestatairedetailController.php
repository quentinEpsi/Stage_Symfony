<?php

namespace App\Controller\Admin;

use App\Entity\Artisan;
use App\Repository\ArtisanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminprestatairedetailController extends AbstractController
{
    /**
     * @Route("/admin/adminprestatairedetail/{id}", name="adminprestatairedetail")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index($id)
    {
        $artisans = $this->getDoctrine()->getRepository(Artisan::class)->find($id);
        $persistentCollection = $artisans->getIdService();
        $infoService = $persistentCollection->getValues();
        return $this->render('admin/adminprestatairedetail/index.html.twig', [
            'infoArtisan' => $artisans,
            'infoService' => $infoService
        ]);
    }
}
