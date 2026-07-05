<?php
require_once 'bootstrap.php';

// الربط بين الدفع والمخزون
\EventDispatcher::subscribe('payment.done', ['\App\Inventory\StockManager', 'deduct']);

// محاكاة مستخدم للمنصة
Context::$tenantId = 'shop_1';
echo "--- بدء تشغيل منصة SaaS ---\n";

$payment = new \App\Payment\PaymentService();
$payment->process("ORDER-123");
\EventDispatcher::dispatch('payment.done', ['product' => 'SaaS-Cloud-Service']);

echo \App\Analytics\AnalyticsService::getReport('shop_1');
echo "\n--- تم الانتهاء بنجاح ---\n";
