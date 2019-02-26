<?php

namespace App\Controller\Espacepartenaire;

use App\Repository\FormulesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FormulemodifController extends AbstractController
{
    /**
     * @Route("/artisan/formulemodif", name="formulemodif")
     */
    public function index(FormulesRepository $repo)
    {
        return $this->render('formulemodif/index.html.twig', [
            'controller_name' => 'FormulemodifController',
        ]);
    }
}
