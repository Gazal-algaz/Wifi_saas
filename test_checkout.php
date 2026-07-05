<?php
require_once 'bootstrap.php';
// تهيئة المتجر والمخزون
\Context::$tenantId = 'shop_1';
$db = \DB::connect();
$db->exec("INSERT INTO vouchers (category_id, tenant_id, code, status) VALUES ('game_card', 'shop_1', 'XYZ-98765', 'available')");

// تنفيذ عملية الشراء
$store = new \App\Storefront\StorefrontController();
$store->purchase('game_card');
