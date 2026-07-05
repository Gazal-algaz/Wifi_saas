<?php
namespace App\Payment;

class GatewayFactory {
    public static function create($gatewayData) {
        // الـ GatewayFactory يقرر أي Driver سيستخدم بناءً على النوع
        return new UniversalDriver($gatewayData);
    }
}

class UniversalDriver {
    private $config;
    public function __construct($config) { $this->config = $config; }

    public function processPayment($orderData) {
        // محاكاة معالجة ديناميكية عبر ترجمة الـ JSON (Parsing)
        echo "جاري تنفيذ الطلب عبر بوابة: " . $this->config['name'] . "\n";
        echo "إرسال البيانات إلى الرابط: " . $this->config['api_url'] . "\n";
        return true;
    }
}
