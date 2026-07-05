<?php
require_once 'bootstrap.php';
use App\Payment\PaymentService;
use App\Inventory\StockManager;

StockManager::registerListeners();

$payment = new PaymentService();
$payment->process("ORDER-" . rand(100, 999), 500);
