<?php
require_once 'bootstrap.php';
use App\Payment\GatewayFactory;

$gateway = GatewayFactory::create('bank');
echo $gateway->pay(500);
