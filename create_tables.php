<?php
$db = new PDO('sqlite:database.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "
CREATE TABLE IF NOT EXISTS custom_gateways (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    tenant_id TEXT,
    name TEXT,
    slug TEXT,
    endpoint TEXT,
    credentials TEXT,
    is_active INTEGER DEFAULT 1
);

CREATE TABLE IF NOT EXISTS vouchers (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    tenant_id TEXT,
    category_id TEXT,
    code TEXT,
    status TEXT DEFAULT 'available'
);

CREATE TABLE IF NOT EXISTS transactions (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    tenant_id TEXT,
    category_id TEXT,
    payment_gateway_slug TEXT,
    transaction_status TEXT,
    gateway_ref_id TEXT,
    amount_paid REAL
);
";

$db->exec($sql);
echo "تم إنشاء الجداول بنجاح!\n";
