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
     * @Route("/paypalbutton/{orderId}", name="paypalbutton")
     * @param $orderId
     */
    public static function getOrder($orderId)
    {
        $client = PayPalClient::client();
        $response = $client->execute(new OrdersGetRequest($orderId));
        print "Status Code: {$response->statusCode}\n";
        print "Status: {$response->result->status}\n";
        print "Order ID: {$response->result->id}\n";
        print "Intent: {$response->result->intent}\n";
        print "Links:\n";
        foreach($response->result->links as $link)
        {
            print "\t{$link->rel}: {$link->href}\tCall Type: {$link->method}\n";
        }
        print "Gross Amount: {$response->result->purchase_units[0]->amount->currency_code} {$response->result->purchase_units[0]->amount->value}\n";

    }

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