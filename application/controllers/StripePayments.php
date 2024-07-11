<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('vendor/autoload.php');

class StripePayments extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->config('stripe');
        \Stripe\Stripe::setApiKey($this->config->item('stripe_api_key'));
    }

    public function create_payment_intent() {
        \Stripe\Stripe::setApiKey($this->config->item('stripe_api_key'));

        $amount = 1000; // Amount in cents
        $currency = 'usd';

        try {
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $amount,
                'currency' => $currency,
                'payment_method_types' => ['card'],
            ]);

            echo json_encode([
                'clientSecret' => $paymentIntent->client_secret,
            ]);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function success() {
        // Payment successful, redirect to success page
        echo "Payment Successful!";
    }

    public function cancel() {
        // Payment cancelled, redirect to cancel page
        echo "Payment Cancelled!";
    }
}
