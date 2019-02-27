<?php

namespace App\Controller;

require __DIR__ . '/../../vendor/autoload.php';

use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;
use Sample\GetOrder;
use Sample\PayPalClient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PaypalbuttonController extends AbstractController
{
    /**
     * @Route("/artisan/paypalbutton/{prix}", name="paypalpaiement")
     * @param $prix
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index($prix)
    {
        return $this->render('paypalbutton/index.html.twig', [
            'prix' => $prix
        ]);
    }
}