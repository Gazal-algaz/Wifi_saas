<?php
namespace App\Analytics;

class AnalyticsService {
    public static function getSalesSummary($tenantId) {
        $db = \DB::connect();
        $stmt = $db->prepare("SELECT COUNT(*) as total_sold, SUM(amount) as revenue 
                              FROM orders WHERE tenant_id = ?");
        $stmt->execute([$tenantId]);
        return $stmt->fetch();
    }
}
