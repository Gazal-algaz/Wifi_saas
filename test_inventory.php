<?php
require_once 'bootstrap.php';
// تجهيز جدول الكروت للتجربة
$db = \DB::connect();
$db->exec("CREATE TABLE IF NOT EXISTS vouchers (id INTEGER PRIMARY KEY, category_id TEXT, tenant_id TEXT, code TEXT, status TEXT, sold_at DATETIME)");
$db->exec("INSERT INTO vouchers (category_id, tenant_id, code, status) VALUES ('cat_1', 'shop_1', 'CODE-12345', 'available')");

// تجربة حجز الكود
$voucher = \App\Inventory\StockManager::claimCode('shop_1', 'cat_1');
if ($voucher) {
    echo "تم بنجاح حجز الكود: " . $voucher['code'] . "\n";
} else {
    echo "عذراً، المخزون فارغ!\n";
}
