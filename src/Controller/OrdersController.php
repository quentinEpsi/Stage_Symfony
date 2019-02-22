<?php

namespace App\Controller;

use App\Entity\Order;
use JMS\Payment\CoreBundle\Form\ChoosePaymentMethodType;
use JMS\Payment\CoreBundle\PluginController\PluginController;
use JMS\Payment\CoreBundle\PluginController\Result;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OrdersController extends AbstractController
{
    /**
     * @Route("/orders", name="orders")
     */
    public function index()
    {
        return $this->render('orders/index.html.twig', [
            'controller_name' => 'OrdersController',
        ]);
    }

    /**
     * @Route("/orders/new/{amount}")
     * @param $amount
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function newAction($amount)
    {
        $em = $this->getDoctrine()->getManager();

        $order = new Order($amount);
        $em->persist($order);
        $em->flush();

        return $this->redirectToRoute('ordersShow', [
            'orderId' => $order->getId(),
        ]);
    }

    /**
     * @Route("/orders/{orderId}/show", name="ordersShow")
     * @param $orderId
     * @param Request $request
     * @param PluginController $ppc
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \JMS\Payment\CoreBundle\PluginController\Exception\InvalidPaymentInstructionException
     */
    public function showAction($orderId, Request $request, PluginController $ppc)
    {
        $order = $this->getDoctrine()->getManager()->getRepository(Order::class)->find($orderId);

        $form = $this->createForm(ChoosePaymentMethodType::class, null, [
            'amount'   => $order->getAmount(),
            'currency' => 'EUR',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ppc->createPaymentInstruction($instruction = $form->getData());

            $order->setPaymentInstruction($instruction);

            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush($order);

            return $this->redirectToRoute('createPayment', [
                'orderId' => $order->getId(),
            ]);
        }

        return $this->render('Orders/show.html.twig', [
            'order' => $order,
            'form'  => $form->createView(),
        ]);
    }

    /**
     * @Route("/orders/createPayment")
     * @param Order $order
     * @param PluginController $ppc
     * @return \JMS\Payment\CoreBundle\Entity\Payment|\JMS\Payment\CoreBundle\Model\PaymentInterface|null
     * @throws \JMS\Payment\CoreBundle\PluginController\Exception\InvalidPaymentInstructionException
     */

    private function createPayment(Order $order, PluginController $ppc)
    {
        $instruction = $order->getPaymentInstruction();
        $pendingTransaction = $instruction->getPendingTransaction();

        if ($pendingTransaction !== null) {
            return $pendingTransaction->getPayment();
        }

        $amount = $instruction->getAmount() - $instruction->getDepositedAmount();

        return $ppc->createPayment($instruction->getId(), $amount);
    }

    /**
     * @Route("/orders/{orderId}/payment/create", name="createPayment")
     * @param $orderId
     * @param PluginController $ppc
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \JMS\Payment\CoreBundle\PluginController\Exception\InvalidPaymentInstructionException
     */
    public function paymentCreateAction($orderId, PluginController $ppc)
    {
        $order = $this->getDoctrine()->getRepository(Order::class)->find($orderId);

        $payment = $this->createPayment($order, $ppc);

        $result = $ppc->approveAndDeposit($payment->getId(), $payment->getTargetAmount());

        if ($result->getStatus() === Result::STATUS_SUCCESS) {
            return $this->redirectToRoute('ordersShow', [
                'orderId' => $order->getId(),
            ]);
        }

        throw $result->getPluginException();

    }
}