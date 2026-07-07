<?php
$password = "1234";
if (!isset($_GET['pass']) || $_GET['pass'] !== $password) {
    die("غير مصرح لك بالدخول!");
}
$db = new PDO('sqlite:database.sqlite');
if (isset($_POST['add_voucher'])) {
    $stmt = $db->prepare("INSERT INTO vouchers (code, status) VALUES (?, 'available')");
    $stmt->execute([$_POST['code']]);
    echo "<p style='color:green;'>تم إضافة الكرت بنجاح!</p>";
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head><meta charset="UTF-8"><title>لوحة التحكم</title></head>
<body>
    <h1>لوحة تحكم متجر الواي فاي</h1>
    <form method="POST">
        <input type="text" name="code" placeholder="أدخل كود الكرت" required>
        <button type="submit" name="add_voucher">إضافة كرت للمخزون</button>
    </form>
    <hr>
    <h2>الكروت المتاحة في المخزن:</h2>
    <?php
    $vouchers = $db->query("SELECT * FROM vouchers WHERE status='available'");
    foreach ($vouchers as $v) { echo "<p>".$v['code']."</p>"; }
    ?>
</body>
</html>
