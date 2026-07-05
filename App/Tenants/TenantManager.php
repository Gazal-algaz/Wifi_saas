<?php
namespace App\Tenants;
class TenantManager {
    public static function getTenant($id) {
        // منطق جلب بيانات المستأجر
        return ['id' => $id, 'name' => 'المتجر الافتراضي'];
    }
}
