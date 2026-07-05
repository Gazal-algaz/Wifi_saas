<?php
require_once 'bootstrap.php';
use App\Inventory\StockManager;
use App\Payment\PaymentService;

// 1. تسجيل المستمعين (يتم في بداية النظام)
StockManager::registerListeners();

// 2. تنفيذ عملية الدفع
$payment = new PaymentService();
$payment->process("ORDER-123");
