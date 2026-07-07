<?php
session_start();
if (isset($_POST['password'])) {
    if ($_POST['password'] == '1234') { // كلمة سر الإدارة
        $_SESSION['admin'] = true;
        header("Location: tenant_dashboard.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <div class="container">
        <h1>مرحباً بك في النظام</h1>
        <form method="POST">
            <input type="password" name="password" placeholder="أدخل كلمة مرور الإدارة">
            <button type="submit" class="btn">دخول كمدير</button>
        </form>
        <br>
        <a href="purchase.php" class="btn" style="background:#555;">الذهاب لصفحة المشتري (بدون دخول)</a>
    </div>
</body>
</html>
