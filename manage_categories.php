<?php
session_start();
$_SESSION['tenant_id'] = 'shop_1'; // للمعاينة فقط

// استخدام مسار مطلق لضمان وصول PHP لملف القاعدة
$db_path = __DIR__ . '/database.sqlite';

try {
    $db = new PDO("sqlite:$db_path");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $tenant_id = $_SESSION['tenant_id'];

    if (isset($_POST['add_category'])) {
        $stmt = $db->prepare("INSERT INTO categories (tenant_id, name, price) VALUES (?, ?, ?)");
        $stmt->execute([$tenant_id, $_POST['name'], $_POST['price']]);
    }

    $stmt = $db->prepare("SELECT * FROM categories WHERE tenant_id = ?");
    $stmt->execute([$tenant_id]);
    $categories = $stmt->fetchAll();
} catch (PDOException $e) {
    die("خطأ في الاتصال: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <div class="container">
        <h1>إدارة فئات الكروت</h1>
        <form method="POST">
            <input type="text" name="name" placeholder="اسم الفئة" required>
            <input type="number" name="price" placeholder="السعر" required>
            <button type="submit" name="add_category" class="btn">إضافة</button>
        </form>
        <table border="1">
            <tr><th>الفئة</th><th>السعر</th></tr>
            <?php foreach ($categories as $cat): ?>
                <tr><td><?= htmlspecialchars($cat['name']) ?></td><td><?= htmlspecialchars($cat['price']) ?></td></tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
