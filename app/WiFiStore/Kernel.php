<?php
namespace App\WiFiStore;

// هذا الملف يجمع كل التعريفات التي أرسلتها في رسالتك الأخيرة
// لضمان عمل الـ Autoload بشكل مثالي
require_once __DIR__ . '/Domain/Ports/Interfaces.php';
require_once __DIR__ . '/Domain/Services/PureOrderProcessingService.php';
require_once __DIR__ . '/Infrastructure/Adapters/Repositories.php';
require_once __DIR__ . '/CoreEngine/Models.php';
require_once __DIR__ . '/Routing/WebRouteManifest.php';
