<?php
$password = "1234"; // غيّر هذه الكلمة لشيء سري
if ($_GET['pass'] !== $password) die("غير مصرح لك بالدخول!");

// الاتصال بقاعدة البيانات
$db = new PDO('sqlite:database.sqlite');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $code = $_POST['code'];
    $cat = $_POST['category_id'];
    $db->exec("INSERT INTO vouchers (code, category_id, status) VALUES ('$code', $cat, 'available')");
    echo "✅ تم إضافة الكرت بنجاح!";
}
?>
<form method="POST">
    <input type="text" name="code" placeholder="كود الكرت (مثلاً: 123456)" required>
    <input type="number" name="category_id" value="1">
    <button type="submit">إضافة للبيع</button>
</form>
