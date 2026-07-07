<?php
echo "--- فحص النظام الشامل ---\n";
echo "1. قاعدة البيانات: " . (file_exists('database.sqlite') ? "موجودة ✅" : "مفقودة ❌") . "\n";
echo "2. مجلد التخزين: " . (is_writable('storage/') ? "قابل للكتابة ✅" : "غير قابل ❌") . "\n";
echo "3. كروت متاحة: " . (count(glob('database.sqlite')) > 0 ? "جاهزة ✅" : "فارغة ❌") . "\n";
?>
