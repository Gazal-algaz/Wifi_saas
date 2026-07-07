<?php
$db = new PDO('sqlite:database.sqlite');
$stmt = $db->query("SELECT * FROM vouchers WHERE status='available' LIMIT 1");
$voucher = $stmt->fetch();

if ($voucher) {
    // حجز الكرت فوراً
    $db->prepare("UPDATE vouchers SET status='sold' WHERE id=?")->execute([$voucher['id']]);
    echo "<h1>تم الشراء بنجاح!</h1><p>الكود الخاص بك هو: " . $voucher['code'] . "</p>";
} else {
    echo "<h1>عذراً، لا توجد كروت متاحة حالياً.</h1>";
}
?>
