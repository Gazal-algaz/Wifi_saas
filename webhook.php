<?php
require_once 'final_test.php';

// ضع بياناتك هنا (استخدم مفاتيحك الخاصة)
$botToken = "YOUR_TELEGRAM_BOT_TOKEN";
$chatId = "YOUR_CHAT_ID";

// استقبال الطلب من صفحة index.php
$buyerPhone = $_POST['phone'] ?? 'غير معروف';

// إرسال إشعار فوري لك
$message = "🔔 طلب شراء جديد!\nرقم العميل: $buyerPhone\nالسعر: 500 ريال\n\n- اضغط هنا لتأكيد التسليم...";
file_get_contents("https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=" . urlencode($message));

echo "تم استلام طلبك بنجاح! سيتم إرسال الكرت فور تأكيد التحويل المالي.";
