<?php
namespace App\Storefront;

class StorefrontController {
    public function purchase($categoryId) {
        $tenantId = \Context::$tenantId;
        
        echo "--- جاري معالجة الطلب لمتجر [$tenantId] ---\n";
        
        // 1. حجز الكود من المخزون
        $voucher = \App\Inventory\StockManager::claimCode($tenantId, $categoryId);
        
        if (!$voucher) {
            echo "خطأ: المنتج غير متوفر حالياً.\n";
            return;
        }
        
        // 2. معالجة الدفع (محاكاة)
        echo "تم حجز المنتج بنجاح: " . $voucher['code'] . "\n";
        echo "توجيه المستخدم إلى بوابة الدفع...\n";
        
        // 3. سجل العملية في التقارير (سيتم ربطه بالمكعب الخامس)
        echo "تم تسجيل العملية في سجل التقارير.\n";
    }
}
