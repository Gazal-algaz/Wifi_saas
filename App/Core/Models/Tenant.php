<?php
namespace App\Core\Models;
class Tenant {
    public static function getCurrent() {
        // سيقوم Middleware بتحديد المستأجر بناءً على النطاق الفرعي
        return ['id' => 'shop_1', 'name' => 'متجر الإلكترونيات'];
    }
}
