<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;

class Payments extends CI_Controller {

    private $apiContext;

    public function __construct() {
        parent::__construct();

        $this->load->config('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $this->config->item('client_id'),
                $this->config->item('secret')
            )
        );

        $this->apiContext->setConfig($this->config->item('settings'));
    }

    public function create_payment() {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal('10.00'); // The amount to charge
        $amount->setCurrency('USD');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription('Payment for reservation');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(base_url('payments/execute_payment'))
                     ->setCancelUrl(base_url('payments/cancel_payment'));

        $payment = new Payment();
        $payment->setIntent('sale')
                ->setPayer($payer)
                ->setTransactions(array($transaction))
                ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            redirect($payment->getApprovalLink());
        } catch (Exception $ex) {
            // Handle the exception
            echo $ex->getMessage();
        }
    }

    public function execute_payment() {
        $paymentId = $this->input->get('paymentId');
        $payerId = $this->input->get('PayerID');

        $payment = Payment::get($paymentId, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            $result = $payment->execute($execution, $this->apiContext);
            // Payment successful, redirect to success page
            redirect('welcome/reservas?status=success');
        } catch (Exception $ex) {
            // Handle the exception
            echo $ex->getMessage();
        }
    }

    public function cancel_payment() {
        // Payment cancelled, redirect to cancel page
        redirect('welcome/reservas?status=cancel');
    }
}
