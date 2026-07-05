<?php
require_once 'bootstrap.php';
use App\Tenants\IdentityService;
use App\Storefront\Menu;

echo "أدخل مفتاح الـ API الخاص بمتجرك: ";
$key = trim(fgets(STDIN));

$tenant = IdentityService::authenticate($key);

if (!$tenant) {
    die("مفتاح غير صالح! لا يمكنك الدخول.\n");
}

echo "أهلاً بك في متجر: " . $tenant['name'] . "\n";

while (true) {
    Menu::display($tenant['id']); // نمرر الـ tenantId لكل عملية
}
