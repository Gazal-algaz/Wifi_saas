<?php
namespace App\Tenants;

class IdentityService {
    public static function authenticate($apiKey) {
        $db = new \PDO('sqlite:database.sqlite');
        $stmt = $db->prepare("SELECT * FROM tenants WHERE api_key = ?");
        $stmt->execute([$apiKey]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
