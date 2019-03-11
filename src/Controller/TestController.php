<?php

namespace App\Controller;

use App\Entity\Artisan;
use App\Entity\ReinitialisationMdp;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function forgottenPassword()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_RETURNTRANSFER => 1,
          CURLOPT_URL => 'curl https://dawanda.com/[XYZ]/products?v=1.1',
          CURLOPT_HTTPHEADER => array('X-Dawanda-Auth: [XYZ]')
         ));
         $resp = curl_exec($curl);
       
         echo curl_error($curl);
       
         curl_close($curl);

        return $this->render('tests/index.html.twig');
    }
}
