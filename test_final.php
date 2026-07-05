<?php
require_once 'bootstrap.php';
\EventDispatcher::subscribe('payment.done', ['\App\Inventory\StockManager', 'deduct']);

\Context::$tenantId = 'shop_1';
$payment = new \App\Payment\PaymentService();
$payment->process("ORDER-999", 500);

// قراءة البيانات من القاعدة للتأكد
$db = \DB::connect();
$res = $db->query("SELECT * FROM orders WHERE tenant_id = 'shop_1'")->fetch();
echo "التحقق من القاعدة: الطلب " . $res['id'] . " موجود بقيمة " . $res['amount'] . "\n";
