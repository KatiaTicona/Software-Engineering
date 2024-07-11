<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['client_id'] = 'YOUR_PAYPAL_CLIENT_ID';
$config['secret'] = 'YOUR_PAYPAL_SECRET';
$config['settings'] = array(
    'mode' => 'sandbox', // or 'live'
    'http.ConnectionTimeOut' => 30,
    'log.LogEnabled' => true,
    'log.FileName' => APPPATH . 'logs/paypal.log',
    'log.LogLevel' => 'FINE'
);
