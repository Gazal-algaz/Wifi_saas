<?php
require_once 'bootstrap.php';
use App\Payment\PaymentService;

\EventDispatcher::subscribe('payment.done', ['\App\Inventory\StockManager', 'deduct']);

// محاكاة مستأجر 1
Context::$tenantId = 'shop_1';
\EventDispatcher::dispatch('payment.done', ['product' => 'Laptop']);

// محاكاة مستأجر 2
Context::$tenantId = 'shop_2';
\EventDispatcher::dispatch('payment.done', ['product' => 'Mouse']);
