<?php
namespace App\WiFiStore\Domain\Ports;
use App\WiFiStore\CoreEngine\Transaction;
use App\WiFiStore\CoreEngine\Voucher;
use App\WiFiStore\CoreEngine\CustomGateway;

interface VoucherRepositoryInterface {
    public function findAndLockAvailable(int $categoryId): ?Voucher;
    public function markAsSold(Voucher $voucher): void;
}

interface TransactionRepositoryInterface {
    public function findAndLock(int $transactionId): ?Transaction;
    public function updateStatus(Transaction $transaction, string $status, string $refId): void;
}
