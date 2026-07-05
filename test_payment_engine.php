<?php
require_once 'bootstrap.php';
use App\Payment\GatewayFactory;

// محاكاة إعدادات بوابة مسترجعة من القاعدة
$gatewayConfig = ['name' => 'PayTabs_Gateway', 'api_url' => 'https://api.paytabs.com'];

$gateway = GatewayFactory::create($gatewayConfig);
$gateway->processPayment(['amount' => 500]);
