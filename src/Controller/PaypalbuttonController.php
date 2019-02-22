<?php

namespace App\Controller;

require __DIR__ . '/../../vendor/autoload.php';

use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;
use Sample\GetOrder;
use Sample\PayPalClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'ASzkvhTwuzBDo-qRfwJz7kn0YU8DFncNUu79LGwbcVSS_SS7esEp0D7T-HsP3VWO9M5IEK-8q8S-CvuA',
        'EPpgwI753w0eOurYwyfKuwyLaQRc-_sJfQrP942yUqlUh6BXV4sjeLp0k5UuT_WcW8iDFKvqw6uDraki'
    )
);

$request = new OrdersCreateRequest();
$request->headers["PayPal-Partner-Attribution-Id"] = "PARTNER_ID_ASSIGNED_BY_YOUR_PARTNER_MANAGER";

class PaypalbuttonController extends AbstractController
{
    /**
     *You can use this function to retrieve an order by passing order ID as an argument.
     * @param $orderId
     */
    public static function getOrder($orderId)
    {
        $client = PayPalClient::client();
        $response = $client->execute(new OrdersGetRequest($orderId));
        /**
         *Enable the following line to print complete response as JSON.
         */
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
}

if (!count(debug_backtrace()))
{
    GetOrder::getOrder('REPLACE-WITH-ORDER-ID', true);
}