<?php
namespace App\Core\Middleware;
class TenantMiddleware {
    public static function handle() {
        // محاكاة التقاط النطاق الفرعي
        $subdomain = $_SERVER['HTTP_HOST'] ?? 'shop_1.saas.local';
        \Context::$tenantId = explode('.', $subdomain)[0];
        
        echo "نظام العزل: تم تحديد المستأجر النشط هو " . \Context::$tenantId . "\n";
    }
}
