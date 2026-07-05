<?php
namespace App\Inventory;

class StockManager {
    public static function claimCode($tenantId, $categoryId) {
        $db = \DB::connect();
        
        // استخدام Transaction لضمان القفل الذري
        $db->beginTransaction();
        
        // اختيار أول كود متاح وتحديث حالته فوراً (Atomic Update)
        $stmt = $db->prepare("SELECT id, code FROM vouchers 
                              WHERE tenant_id = ? AND category_id = ? AND status = 'available' 
                              LIMIT 1");
        $stmt->execute([$tenantId, $categoryId]);
        $voucher = $stmt->fetch();
        
        if ($voucher) {
            $update = $db->prepare("UPDATE vouchers SET status = 'sold', sold_at = datetime('now') WHERE id = ?");
            $update->execute([$voucher['id']]);
            $db->commit();
            return $voucher;
        }
        
        $db->rollBack();
        return null; // لا يوجد مخزون
    }
}
