<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit;
}
// هنا كود إضافة الكروت (نفس الكود السابق)
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <div class="container">
        <h1>لوحة تحكم المدير</h1>
        <p>مرحباً بك في لوحتك الخاصة.</p>
        <a href="logout.php" class="btn" style="background:red;">تسجيل الخروج</a>
    </div>
</body>
</html>
