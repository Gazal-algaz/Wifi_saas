<?php
session_start();
// كلمة المرور التي ستعطيها للمستأجر (يمكنك تغييرها)
$password = "123456"; 

if (isset($_POST['pass']) && $_POST['pass'] == $password) {
    $_SESSION['logged_in'] = true;
    header("Location: dashboard.php");
    exit;
}
?>
<html><body style="font-family:sans-serif; text-align:center; padding-top:50px;">
    <h2>دخول المستأجرين</h2>
    <form method="POST"><input type="password" name="pass" placeholder="أدخل كلمة المرور"><button type="submit">دخول</button></form>
</body></html>
