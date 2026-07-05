<?php
require_once 'bootstrap.php';
use App\Tenants\Tenant;
use App\Inventory\StockManager;

echo Tenant::check() . "\n";
echo StockManager::status() . "\n";
