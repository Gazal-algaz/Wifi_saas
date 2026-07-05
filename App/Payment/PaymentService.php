<?php
namespace App\Payment;
class PaymentService {
    public function process($orderId, $amount) {
        $db = \DB::connect();
        $stmt = $db->prepare("INSERT INTO orders (id, amount, tenant_id) VALUES (?, ?, ?)");
        $stmt->execute([$orderId, $amount, \Context::$tenantId]);
        \EventDispatcher::dispatch('payment.done', ['orderId' => $orderId, 'amount' => $amount]);
        echo "تم حفظ الطلب $orderId في القاعدة.\n";
    }
}
