<?php
$db = new PDO('sqlite:database.sqlite');
$stmt = $db->query("SELECT * FROM vouchers WHERE status='available' LIMIT 1");
$voucher = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>استلام الكرت</title>
</head>
<body>
    <div class="container">
        <?php if ($voucher): 
            $db->prepare("UPDATE vouchers SET status='sold' WHERE id=?")->execute([$voucher['id']]); ?>
            <h1>تمت العملية بنجاح!</h1>
            <p>الكود الخاص بك هو:</p>
            <div class="card-code"><?php echo $voucher['code']; ?></div>
            <a href="index.php" class="btn">العودة للرئيسية</a>
        <?php else: ?>
            <h1>عذراً، نفذت الكمية.</h1>
            <a href="index.php" class="btn">العودة للرئيسية</a>
        <?php endif; ?>
    </div>
</body>
</html>
