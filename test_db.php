<?php
try {
    $db = new PDO('sqlite:database.sqlite');
    $stmt = $db->query("SELECT count(*) FROM vouchers");
    echo "✅ تم الاتصال بقاعدة البيانات بنجاح!\n";
    echo "📊 عدد الكروت: " . $stmt->fetchColumn() . "\n";
} catch (PDOException $e) {
    echo "❌ فشل الاتصال: " . $e->getMessage();
}
