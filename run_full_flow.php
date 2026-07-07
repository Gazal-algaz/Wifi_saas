<?php
// تحميل يدوي للملفات الأساسية
require_once 'bootstrap.php';
require_once 'app/WiFiStore/Domain/Ports/VoucherRepositoryInterface.php';
require_once 'app/WiFiStore/Domain/Ports/TransactionRepositoryInterface.php';
require_once 'app/WiFiStore/Domain/Services/PureOrderProcessingService.php';
require_once 'app/WiFiStore/Infrastructure/Adapters/EloquentVoucherRepository.php';
require_once 'app/WiFiStore/Infrastructure/Adapters/EloquentTransactionRepository.php';

use App\WiFiStore\Domain\Services\PureOrderProcessingService;
use App\WiFiStore\Infrastructure\Adapters\EloquentVoucherRepository;
use App\WiFiStore\Infrastructure\Adapters\EloquentTransactionRepository;

$service = new PureOrderProcessingService(new EloquentVoucherRepository(), new EloquentTransactionRepository());

echo "🔄 بدء محاكاة عملية شراء...\n";
// ... باقي الكود كما هو
