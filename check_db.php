<?php
$db = new PDO('sqlite:database.sqlite');

// 1. عرض الجداول الموجودة
$tables = $db->query("SELECT name FROM sqlite_master WHERE type='table'")->fetchAll();
echo "<h2>الجداول الموجودة:</h2>";
foreach ($tables as $t) echo "- " . $t['name'] . "<br>";

// 2. عرض أعمدة جدول الكروت (لنتأكد من وجود tenant_id)
$cols = $db->query("PRAGMA table_info(vouchers)")->fetchAll();
echo "<h2>أعمدة جدول الكروت (vouchers):</h2>";
foreach ($cols as $c) echo "- " . $c['name'] . "<br>";

// 3. عرض البيانات الموجودة
$data = $db->query("SELECT * FROM vouchers")->fetchAll();
echo "<h2>بيانات الكروت المخزنة حالياً:</h2>";
print_r($data);
?>
