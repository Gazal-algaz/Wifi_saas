<?php
$db = new PDO('sqlite:database.sqlite');
echo "<h1>تقرير حالة النظام (System Audit)</h1>";

// 1. فحص الجداول والربط
$tables = ['vouchers', 'orders', 'transactions'];
foreach ($tables as $table) {
    echo "<h3>جدول: $table</h3>";
    $cols = $db->query("PRAGMA table_info($table)")->fetchAll();
    $has_tenant = false;
    foreach ($cols as $c) {
        echo "- " . $c['name'] . "<br>";
        if ($c['name'] == 'tenant_id') $has_tenant = true;
    }
    echo ($has_tenant) ? "✅ يحتوي على tenant_id<br>" : "❌ **يفتقد لـ tenant_id**<br>";
}

// 2. فحص المستأجرين
echo "<h3>المستأجرون المسجلون:</h3>";
$tenants = $db->query("SELECT * FROM tenants")->fetchAll();
if (count($tenants) > 0) {
    foreach ($tenants as $t) echo "- " . $t['name'] . " (ID: " . $t['id'] . ")<br>";
} else {
    echo "لا يوجد مستأجرون مسجلون حالياً.";
}

// 3. فحص الكروت اليتيمة
$orphans = $db->query("SELECT count(*) FROM vouchers WHERE tenant_id IS NULL")->fetchColumn();
echo "<h3>الكروت اليتيمة (بدون مستأجر): $orphans</h3>";
?>
