<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}
// باقي كود لوحة التحكم الذي كتبناه سابقاً
require_once 'app/WiFiStore/System.php';
$db = new PDO('sqlite:database.sqlite');
echo "<html><head><style>body{font-family:sans-serif; padding:20px; direction:rtl;} table{width:100%; border-collapse:collapse;} th,td{border:1px solid #ddd; padding:12px; text-align:center;} th{background:#4CAF50; color:white;}</style></head><body>";
echo "<h1>لوحة التحكم المالية</h1><a href='logout.php'>خروج</a><table><tr><th>رقم العملية</th><th>الحالة</th><th>المبلغ</th></tr>";
$transactions = $db->query("SELECT * FROM transactions ORDER BY id DESC")->fetchAll();
foreach ($transactions as $t) {
    echo "<tr><td>{$t['id']}</td><td>{$t['transaction_status']}</td><td>{$t['amount_paid']} $</td></tr>";
}
echo "</table></body></html>";
?>
