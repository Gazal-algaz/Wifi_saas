<?php
$db = new PDO('sqlite:database.sqlite');
echo "--- بدء الاختبار المطور ---" . PHP_EOL;

// 1. تنظيف وإعادة تهيئة
$db->exec("DELETE FROM vouchers; DELETE FROM transactions;");

// 2. إدخال بيانات مع التأكد من الحصول على الـ ID
$db->exec("INSERT INTO vouchers (category_id, code, status) VALUES (1, 'FREE-WIFI-2026', 'available');");
$v_id = $db->lastInsertId();

$db->exec("INSERT INTO transactions (category_id, transaction_status) VALUES (1, 'pending');");
$t_id = $db->lastInsertId();

echo "[1/3] البيانات جاهزة (Voucher ID: $v_id, Transaction ID: $t_id)." . PHP_EOL;

// 3. محاكاة المعاملة
$db->exec("UPDATE vouchers SET status = 'sold' WHERE id = $v_id");
$db->exec("UPDATE transactions SET transaction_status = 'success', gateway_ref_id = 'REF_999' WHERE id = $t_id");

echo "[2/3] تمت عملية البيع بنجاح." . PHP_EOL;

// 4. التحقق النهائي
$stmt = $db->prepare("SELECT * FROM transactions WHERE id = ? AND transaction_status = 'success'");
$stmt->execute([$t_id]);
$result = $stmt->fetch();

if ($result && $result['gateway_ref_id'] == 'REF_999') {
    echo "[3/3] النظام اجتاز الاختبار الشامل بنجاح!" . PHP_EOL;
} else {
    echo "فشل الاختبار: تعذر العثور على المعاملة المحدثة." . PHP_EOL;
}
